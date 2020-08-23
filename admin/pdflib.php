<?php


if (!defined('PDF_CUSTOM_FONT_PATH')) {
    /** Defines the site-specific location of fonts. */
    define('PDF_CUSTOM_FONT_PATH', './fonts/');
}

if (!defined('PDF_DEFAULT_FONT')) {
    /** Default font to be used. */
    define('PDF_DEFAULT_FONT', 'FreeSerif');
}

/** tell tcpdf it is configured here instead of in its own config file */
define('K_TCPDF_EXTERNAL_CONFIG', 1);

// The configuration constants needed by tcpdf follow

/**
 * Init K_PATH_FONTS and PDF_FONT_NAME_MAIN constant.
 *
 * Unfortunately this hack is necessary because the constants need
 * to be defined before inclusion of the tcpdf.php file.
 */
function tcpdf_init_k_font_path() {

    $defaultfonts = './tcpdf/fonts/';

    if (!defined('K_PATH_FONTS')) {
        if (is_dir(PDF_CUSTOM_FONT_PATH)) {
            // NOTE:
            //   There used to be an option to have just one file and having it set as default
            //   but that does not make sense any more because add-ons using standard fonts
            //   would fail very badly, also font families consist of multiple php files for
            //   regular, bold, italic, etc.

            // Check for some standard font files if present and if not do not use the custom path.
            $somestandardfiles = array('courier',  'helvetica', 'times', 'symbol', 'zapfdingbats', 'freeserif', 'freesans');
            $missing = false;
            foreach ($somestandardfiles as $file) {
                if (!file_exists(PDF_CUSTOM_FONT_PATH . $file . '.php')) {
                    $missing = true;
                    break;
                }
            }
            if ($missing) {
                define('K_PATH_FONTS', $defaultfonts);
            } else {
                define('K_PATH_FONTS', PDF_CUSTOM_FONT_PATH);
            }
        } else {
            define('K_PATH_FONTS', $defaultfonts);
        }
    }

    if (!defined('PDF_FONT_NAME_MAIN')) {
        define('PDF_FONT_NAME_MAIN', strtolower(PDF_DEFAULT_FONT));
    }
}
tcpdf_init_k_font_path();

/** tcpdf installation path */
define('K_PATH_MAIN', './tcpdf/');

/** URL path to tcpdf installation folder */
define('K_PATH_URL', '/tcpdf/');

/** cache directory for temporary files (full path) */
define('K_PATH_CACHE', realpath('./tmp/'));

/** images directory */
define('K_PATH_IMAGES', realpath('.'));

/** blank image */
define('K_BLANK_IMAGE', realpath('./spacer.gif'));

/** height of cell repect font height */
define('K_CELL_HEIGHT_RATIO', 1.25);

/** reduction factor for small font */
define('K_SMALL_RATIO', 2/3);

/** Throw exceptions from errors so they can be caught and recovered from. */
define('K_TCPDF_THROW_EXCEPTION_ERROR', true);

require_once(dirname(__FILE__).'/tcpdf/tcpdf.php');

/**
 * Wrapper class that extends TCPDF (lib/tcpdf/tcpdf.php).
 * Moodle customisations are done here.
 *
 * @package     moodlecore
 * @copyright   Vy-Shane Sin Fat
 * @license     http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class pdf extends TCPDF {



    /**
     * Class constructor
     *
     * See the parent class documentation for the parameters info.
     */
    public function __construct($orientation='P', $unit='mm', $format='A4', $unicode=true, $encoding='UTF-8') {


        parent::__construct($orientation, $unit, $format, $unicode, $encoding);

        // theses replace the tcpdf's config/lang/ definitions
       // $this->l['w_page']          = get_string('page');
       // $this->l['a_meta_language'] = current_language();
       // $this->l['a_meta_charset']  = 'UTF-8';
       // $this->l['a_meta_dir']      = get_string('thisdirection', 'langconfig');
    }

    /**
     * Send the document to a given destination: string, local file or browser.
     * In the last case, the plug-in may be used (if present) or a download ("Save as" dialog box) may be forced.<br />
     * The method first calls Close() if necessary to terminate the document.
     * @param $name (string) The name of the file when saved. Note that special characters are removed and blanks characters are replaced with the underscore character.
     * @param $dest (string) Destination where to send the document. It can take one of the following values:<ul><li>I: send the file inline to the browser (default). The plug-in is used if available. The name given by name is used when one selects the "Save as" option on the link generating the PDF.</li><li>D: send to the browser and force a file download with the name given by name.</li><li>F: save to a local server file with the name given by name.</li><li>S: return the document as a string (name is ignored).</li><li>FI: equivalent to F + I option</li><li>FD: equivalent to F + D option</li><li>E: return the document as base64 mime multi-part email attachment (RFC 2045)</li></ul>
     * @public
     * @since Moodle 1.0
     * @see Close()
     */
    // public function Output($name='doc.pdf', $dest='I') {
    //     $olddebug = error_reporting(0);
    //     $result  = parent::output($name, $dest);
    //     error_reporting($olddebug);
    //     return $result;
    // }
//==================================================================

    public function Output($name='doc.pdf', $dest='I') {
        //Output PDF to some destination
        //Finish document if necessary
        if ($this->state < 3) {
            $this->Close();
        }
        //Normalize parameters
        if (is_bool($dest)) {
            $dest = $dest ? 'D' : 'F';
        }
        $dest = strtoupper($dest);
        if ($dest[0] != 'F') {
            $name = preg_replace('/[\s]+/', '_', $name);
            $name = preg_replace('/[^a-zA-Z0-9_\.-]/', '', $name);
        }
        if ($this->sign) {
            // *** apply digital signature to the document ***
            // get the document content
            $pdfdoc = $this->getBuffer();
            // remove last newline
            $pdfdoc = substr($pdfdoc, 0, -1);
            // remove filler space
            $byterange_string_len = strlen(TCPDF_STATIC::$byterange_string);
            // define the ByteRange
            $byte_range = array();
            $byte_range[0] = 0;
            $byte_range[1] = strpos($pdfdoc, TCPDF_STATIC::$byterange_string) + $byterange_string_len + 10;
            $byte_range[2] = $byte_range[1] + $this->signature_max_length + 2;
            $byte_range[3] = strlen($pdfdoc) - $byte_range[2];
            $pdfdoc = substr($pdfdoc, 0, $byte_range[1]).substr($pdfdoc, $byte_range[2]);
            // replace the ByteRange
            $byterange = sprintf('/ByteRange[0 %u %u %u]', $byte_range[1], $byte_range[2], $byte_range[3]);
            $byterange .= str_repeat(' ', ($byterange_string_len - strlen($byterange)));
            $pdfdoc = str_replace(TCPDF_STATIC::$byterange_string, $byterange, $pdfdoc);
            // write the document to a temporary folder
            $tempdoc = TCPDF_STATIC::getObjFilename('doc', $this->file_id);
            $f = TCPDF_STATIC::fopenLocal($tempdoc, 'wb');
            if (!$f) {
                $this->Error('Unable to create temporary file: '.$tempdoc);
            }
            $pdfdoc_length = strlen($pdfdoc);
            fwrite($f, $pdfdoc, $pdfdoc_length);
            fclose($f);
            // get digital signature via openssl library
            $tempsign = TCPDF_STATIC::getObjFilename('sig', $this->file_id);
            if (empty($this->signature_data['extracerts'])) {
                openssl_pkcs7_sign($tempdoc, $tempsign, $this->signature_data['signcert'], array($this->signature_data['privkey'], $this->signature_data['password']), array(), PKCS7_BINARY | PKCS7_DETACHED);
            } else {
                openssl_pkcs7_sign($tempdoc, $tempsign, $this->signature_data['signcert'], array($this->signature_data['privkey'], $this->signature_data['password']), array(), PKCS7_BINARY | PKCS7_DETACHED, $this->signature_data['extracerts']);
            }
            // read signature
            $signature = file_get_contents($tempsign);
            // extract signature
            $signature = substr($signature, $pdfdoc_length);
            $signature = substr($signature, (strpos($signature, "%%EOF\n\n------") + 13));
            $tmparr = explode("\n\n", $signature);
            $signature = $tmparr[1];
            // decode signature
            $signature = base64_decode(trim($signature));
            // add TSA timestamp to signature
            $signature = $this->applyTSA($signature);
            // convert signature to hex
            $signature = current(unpack('H*', $signature));
            $signature = str_pad($signature, $this->signature_max_length, '0');
            // Add signature to the document
            $this->buffer = substr($pdfdoc, 0, $byte_range[1]).'<'.$signature.'>'.substr($pdfdoc, $byte_range[1]);
            $this->bufferlen = strlen($this->buffer);
        }
        switch($dest) {
            case 'I': {
                // Send PDF to the standard output
                if (ob_get_contents()) {
                    $this->Error('Some data has already been output, can\'t send PDF file');
                }
                if (php_sapi_name() != 'cli') {
                    // send output to a browser
                    header('Content-Type: application/pdf');
                    if (headers_sent()) {
                        $this->Error('Some data has already been output to browser, can\'t send PDF file');
                    }
                    header('Cache-Control: private, must-revalidate, post-check=0, pre-check=0, max-age=1');
                    //header('Cache-Control: public, must-revalidate, max-age=0'); // HTTP/1.1
                    header('Pragma: public');
                    header('Expires: Sat, 26 Jul 1997 05:00:00 GMT'); // Date in the past
                    header('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT');
                    header('Content-Disposition: inline; filename="'.basename($name).'"');
                    TCPDF_STATIC::sendOutputData($this->getBuffer(), $this->bufferlen);
                } else {
                    echo $this->getBuffer();
                }
                break;
            }
            case 'D': {
                // download PDF as file
                if (ob_get_contents()) {
                    $this->Error('Some data has already been output, can\'t send PDF file');
                }
                header('Content-Description: File Transfer');
                if (headers_sent()) {
                    $this->Error('Some data has already been output to browser, can\'t send PDF file');
                }
                header('Cache-Control: private, must-revalidate, post-check=0, pre-check=0, max-age=1');
                //header('Cache-Control: public, must-revalidate, max-age=0'); // HTTP/1.1
                header('Pragma: public');
                header('Expires: Sat, 26 Jul 1997 05:00:00 GMT'); // Date in the past
                header('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT');
                // force download dialog
                if (strpos(php_sapi_name(), 'cgi') === false) {
                    header('Content-Type: application/force-download');
                    header('Content-Type: application/octet-stream', false);
                    header('Content-Type: application/download', false);
                    header('Content-Type: application/pdf', false);
                } else {
                    header('Content-Type: application/pdf');
                }
                // use the Content-Disposition header to supply a recommended filename
                header('Content-Disposition: attachment; filename="'.basename($name).'"');
                header('Content-Transfer-Encoding: binary');
                TCPDF_STATIC::sendOutputData($this->getBuffer(), $this->bufferlen);
                break;
            }
            case 'F':
            case 'FI':
            case 'FD': {
                // save PDF to a local file
                $f = TCPDF_STATIC::fopenLocal($name, 'wb');
                if (!$f) {
                    $this->Error('Unable to create output file: '.$name);
                }
                fwrite($f, $this->getBuffer(), $this->bufferlen);
                fclose($f);
                if ($dest == 'FI') {
                    // send headers to browser
                    header('Content-Type: application/pdf');
                    header('Cache-Control: private, must-revalidate, post-check=0, pre-check=0, max-age=1');
                    //header('Cache-Control: public, must-revalidate, max-age=0'); // HTTP/1.1
                    header('Pragma: public');
                    header('Expires: Sat, 26 Jul 1997 05:00:00 GMT'); // Date in the past
                    header('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT');
                    header('Content-Disposition: inline; filename="'.basename($name).'"');
                    TCPDF_STATIC::sendOutputData(file_get_contents($name), filesize($name));
                } elseif ($dest == 'FD') {
                    // send headers to browser
                    if (ob_get_contents()) {
                        $this->Error('Some data has already been output, can\'t send PDF file');
                    }
                    header('Content-Description: File Transfer');
                    if (headers_sent()) {
                        $this->Error('Some data has already been output to browser, can\'t send PDF file');
                    }
                    header('Cache-Control: private, must-revalidate, post-check=0, pre-check=0, max-age=1');
                    header('Pragma: public');
                    header('Expires: Sat, 26 Jul 1997 05:00:00 GMT'); // Date in the past
                    header('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT');
                    // force download dialog
                    if (strpos(php_sapi_name(), 'cgi') === false) {
                        header('Content-Type: application/force-download');
                        header('Content-Type: application/octet-stream', false);
                        header('Content-Type: application/download', false);
                        header('Content-Type: application/pdf', false);
                    } else {
                        header('Content-Type: application/pdf');
                    }
                    // use the Content-Disposition header to supply a recommended filename
                    header('Content-Disposition: attachment; filename="'.basename($name).'"');
                    header('Content-Transfer-Encoding: binary');
                    TCPDF_STATIC::sendOutputData(file_get_contents($name), filesize($name));
                }
                break;
            }
            case 'E': {
                // return PDF as base64 mime multi-part email attachment (RFC 2045)
                $retval = 'Content-Type: application/pdf;'."\r\n";
                $retval .= ' name="'.$name.'"'."\r\n";
                $retval .= 'Content-Transfer-Encoding: base64'."\r\n";
                $retval .= 'Content-Disposition: attachment;'."\r\n";
                $retval .= ' filename="'.$name.'"'."\r\n\r\n";
                $retval .= chunk_split(base64_encode($this->getBuffer()), 76, "\r\n");
                return $retval;
            }
            case 'S': {
                // returns PDF as a string
                return $this->getBuffer();
            }
            default: {
                $this->Error('Incorrect output destination: '.$dest);
            }
        }
        return '';
    }

    //===============================================================
    /**
     * Is this font family one of core fonts?
     * @param string $fontfamily
     * @return bool
     */
    public function is_core_font_family($fontfamily) {
        return isset($this->CoreFonts[$fontfamily]);
    }

    /**
     * Returns list of font families and types of fonts.
     *
     * @return array multidimensional array with font families as keys and B, I, BI and N as values.
     */
    public function get_font_families() {
        $families = array();
        foreach ($this->fontlist as $font) {
            if (strpos($font, 'uni2cid') === 0) {
                // This is not an font file.
                continue;
            }
            if (strpos($font, 'cid0') === 0) {
                // These do not seem to work with utf-8, better ignore them for now.
                continue;
            }
            if (substr($font, -2) === 'bi') {
                $family = substr($font, 0, -2);
                if (in_array($family, $this->fontlist)) {
                    $families[$family]['BI'] = 'BI';
                    continue;
                }
            }
            if (substr($font, -1) === 'i') {
                $family = substr($font, 0, -1);
                if (in_array($family, $this->fontlist)) {
                    $families[$family]['I'] = 'I';
                    continue;
                }
            }
            if (substr($font, -1) === 'b') {
                $family = substr($font, 0, -1);
                if (in_array($family, $this->fontlist)) {
                    $families[$family]['B'] = 'B';
                    continue;
                }
            }
            // This must be a Family or incomplete set of fonts present.
            $families[$font]['R'] = 'R';
        }

        // Sort everything consistently.
        ksort($families);
        foreach ($families as $k => $v) {
            krsort($families[$k]);
        }

        return $families;
    }
}
