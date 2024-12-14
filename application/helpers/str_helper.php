<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('terbilang'))
{
	/**
	 * @param int $number
	 * @return string
	 */
	function terbilang($number)
	{
		$return = penyebut(normalize($number));
		$return = trim($return);

		$minus = '';
		if ($number < 0) $minus = 'minus ';

		$return = $minus . $return . ' rupiah';
		return ucwords($return);
	}
}

if (!function_exists('penyebut'))
{
	/**
	 * @param int $number
	 * @return string
	 */
	function penyebut($number)
	{
        $nilai = abs($number);
        $huruf = ["", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas"];

        $temp = "";
        if ($nilai < 12) {
            $temp = " " . $huruf[$nilai];
        } else if ($nilai < 20) {
            $temp = penyebut($nilai - 10) . " belas";
        } else if ($nilai < 100) {
            $temp = penyebut($nilai / 10) . " puluh" . penyebut($nilai % 10);
        } else if ($nilai < 200) {
            $temp = " seratus" . penyebut($nilai - 100);
        } else if ($nilai < 1000) {
            $temp = penyebut($nilai / 100) . " ratus" . penyebut($nilai % 100);
        } else if ($nilai < 2000) {
            $temp = " seribu" . penyebut($nilai - 1000);
        } else if ($nilai < 1000000) {
            $temp = penyebut($nilai / 1000) . " ribu" . penyebut($nilai % 1000);
        } else if ($nilai < 1000000000) {
            $temp = penyebut($nilai / 1000000) . " juta" . penyebut($nilai % 1000000);
        } else if ($nilai < 1000000000000) {
            $temp = penyebut($nilai / 1000000000) . " milyar" . penyebut(fmod($nilai, 1000000000));
        } else if ($nilai < 1000000000000000) {
            $temp = penyebut($nilai / 1000000000000) . " trilyun" . penyebut(fmod($nilai, 1000000000000));
        }

        return $temp;
	}
}

if (!function_exists('convert'))
{
	/**
     * Convert byte
     *
     * @param int|float $size
     *
	 * @return string
	 */
    function convert($size) {
        $unit = ['b', 'kb', 'mb', 'gb', 'tb', 'pb'];
        return @round($size/pow(1024,($i=floor(log($size,1024)))),2).' '.$unit[$i];
    }
}

if (!function_exists('clean')) {
    /**
     * Trim whitespace, hapus tag php/html, hapus unicode NO-BREAK SPACE/nbsp (U+00a0),
     * convert special character jadi karakter biasa
     *
     * @param string $string
     * @param bool   $stripTags
     *
     * @return string
     */
    function clean($string, $stripTags = true)
    {
        return htmlspecialchars(clean_alt($string, $stripTags));
    }
}

if (!function_exists('clean_alt')) {
    /**
     * Trim whitespace, hapus tag php/html, hapus unicode NO-BREAK SPACE/nbsp (U+00a0)
     *
     * @param string $string
     * @param bool   $stripTags
     *
     * @return string
     */
    function clean_alt($string, $stripTags = true)
    {
        $res = trim(preg_replace('/\xc2\xa0/', '', $string));
        return $stripTags ? strip_tags($res) : $res;
    }
}

if (!function_exists('cleanTxtArea')) {
    /**
     * Trim whitespace, hapus unicode NO-BREAK SPACE/nbsp (U+00a0)
     *
     * @param string $string
     *
     * @return string
     */
    function cleanTxtArea($string)
    {
        return trim(preg_replace('/\xc2\xa0/', '', $string));
    }
}

if (!function_exists('seo_title')) {
    /**
     * @param string $string
     *
     * @return string
     */
    function seo_title($string)
    {
        $specialChar = ['-', '/', '\\', ',', '.', '#', ':', ';', '\'', '"', '[', ']', '{', '}', ')', '(', '|', '`', '~', '!', '@', '%', '$', '^', '&', '*', '=', '?', '+', '–'];
        $string = str_replace($specialChar, '', $string); // Hilangkan karakter yang telah disebutkan di array $d
        $string = str_replace(' ', '-', $string); // Ganti spasi dengan tanda -
        return strtolower($string); // Ubah hurufnya menjadi kecil semua
    }
}

if (!function_exists('snake')) {
    /**
     * @param string $string
     *
     * @return string
     */
    function snake($string)
    {
        // $deleted = [' ', '-', '/', '\\', ',', '.', '#', ':', ';', '\'', '"', '[', ']', '{', '}', ')', '(', '|', '`', '~', '!', '@', '%', '$', '^', '&', '*', '=', '?', '+', '–'];
        // $string = str_replace($deleted, '_', $string);
        // return str_replace('__', '_', $string);
        $deleted = [' ', '-', '/', '\\', ',', '.', '#', ':', ';', '\'', '"', '[', ']', '{', '}', ')', '(', '|', '`', '~', '!', '@', '%', '$', '^', '&', '*', '=', '?', '+', '–'];
        return str_replace($deleted, '_', $string);
    }
}

if (!function_exists('minify_html')) {
    /**
     * Minify HTML (not really reliable)
     *
     * @param string $html
     *
     * @return string
     */
    function minify_html($html) {
        // Remove HTML comments (except IE conditional comments)
        $html = preg_replace('/<!--.*?-->/', '', $html);

        // Remove whitespace between tags
        $html = preg_replace('/>\s+</', '><', $html);
        $html = preg_replace('/>\s*?</', '><', $html);

        // Remove leading/trailing whitespace
        return clean_alt($html, false);
    }
}

if (!function_exists('toWhiteSpace')) {
    /**
     * @param string $string
     *
     * @return string
     */
    function toWhiteSpace($string)
    {
        $deleted = ['_', '-', '/', '\\', ',', '.', '#', ':', ';', '\'', '"', '[', ']', '{', '}', ')', '(', '|', '`', '~', '!', '@', '%', '$', '^', '&', '*', '=', '?', '+', '–'];
        return str_replace($deleted, ' ', $string);
    }
}

if (!function_exists('divide')) {
    /**
     * @param int|string|float $first
     * @param int|string|float $second
     *
     * @return int|float
     */
    function divide($first, $second)
    {
        if (in_array(0, [$first, $second])) return 0;
        return $first / $second;
    }
}

if (!function_exists('specialCharToWhiteSpace')) {
    /**
     * Sisain alphanumeric, sama whitespace aja.
     *
     * @param string $str
     *
     * @return string
     */
    function specialCharToWhiteSpace($str)
    {
        return preg_replace("/[^a-zA-Z0-9\s]/", ' ', $str);
    }
}

if (!function_exists('normalize')) {
    /**
     * Hapus semua kecuali angka
     *
     * @param string $phone
     *
     * @return string
     */
    function normalize($phone)
    {
        return preg_replace('/[^0-9]++/', '', (string) $phone);
    }
}

if (!function_exists('toID')) {
    /**
     * Jadi format nomor telepon dengan kode negara Indonesia (62)
     *
     * @param string $phone
     *
     * @return string "08123456789" => "628123456789" or "   +628o<br>_.())21wwdw382dww90wdwada482    " => "6282138290482"
     */
    function toID($phone)
    {
        // Normalisasi inputan, hapus semua karakternya kecuali angka dari $phone
        $phone = normalize($phone);

        // Kalo prefix-nya 0 atau 62, hapus biar sama semua
        // Kalo prefix bukan 0 atau 62 gak perlu dicek
        if (startsWith($phone, '0')) {
            $phone = after($phone, '0');
        } elseif (startsWith($phone, '62')) {
            $phone = after($phone, '62');
        }

        // Semuanya nanti formatnya 8XXXXXXXXX, baru ditambah 62 di depan
        return '62' . $phone;
    }
}

if (!function_exists('toLeadingZero')) {
    /**
     * Jadi format nomor telepon dengan angka depan nol (0)
     *
     * @param string $phone
     *
     * @return string "628123456789" => "08123456789" or "   +628o<br>_.())21wwdw382dww90wdwada482    " => "082138290482"
     */
    function toLeadingZero($phone)
    {
        // Normalisasi inputan, hapus semua karakternya kecuali angka dari $phone
        $phone = normalize($phone);

        // Kalo prefix-nya 0 atau 62, hapus biar sama semua
        // Kalo prefix bukan 0 atau 62 gak perlu dicek
        if (startsWith($phone, '0')) {
            $phone = after($phone, '0');
        } elseif (startsWith($phone, '62')) {
            $phone = after($phone, '62');
        }

        // Semuanya nanti formatnya 8XXXXXXXXX, baru ditambah 0 di depan
        return '0' . $phone;
    }
}

if (!function_exists('isJson')) {
    /**
     * Determine if a given string is valid JSON.
     *
     * @param  string  $value
     * @return bool
     */
    function isJson($value)
    {
        if (!is_string($value)) {
            return false;
        }

        try {
            json_decode($value, true, 512, JSON_THROW_ON_ERROR);
        } catch (\Exception $e) {
            return false;
        }

        return true;
    }
}

if (!function_exists('isValidURL')) {
    /**
     * Determine if a given string is valid URL.
     *
     * @param  string  $value
     * @return bool
     */
    function isValidURL($value)
    {
        return filter_var($value, FILTER_VALIDATE_URL);
    }
}

if (!function_exists('isValidEmail')) {
    /**
     * Determine if a given string is valid Email.
     *
     * @param  string  $value
     * @return bool
     */
    function isValidEmail($value)
    {
        return filter_var($value, FILTER_VALIDATE_EMAIL);
    }
}

if (!function_exists('isValidDate')) {
    /**
     * Determine if a given string is valid Date.
     *
     * @param  string  $value
     * @return bool
     */
    function isValidDate($date)
    {
        // Create a new DateTime object with the provided date string
        $dateTime = DateTime::createFromFormat('Y-m-d', $date);

        // Check if the date is valid by comparing it with the original input and checking for errors
        return $dateTime && $dateTime->format('Y-m-d') === $date && !DateTime::getLastErrors()['warning_count'];
    }
}

if (!function_exists('between')) {
    /**
     * Get the portion of a string between two given values.
     *
     * @param  string  $subject
     * @param  string  $from
     * @param  string  $to
     * @return string
     */
    function between($subject, $from, $to)
    {
        if ($from === '' || $to === '') {
            return $subject;
        }

        return after(before($subject, $from), $to);
    }
}

if (!function_exists('after')) {
    /**
     * Return the remainder of a string after the first occurrence of a given value.
     *
     * @param  string  $subject
     * @param  string  $search
     * @return string
     */
    function after($subject, $search)
    {
        return $search === '' ? $subject : array_reverse(explode($search, $subject, 2))[0];
    }
}

if (!function_exists('afterLast')) {
    /**
     * Return the remainder of a string after the last occurrence of a given value.
     *
     * @param  string  $subject
     * @param  string  $search
     * @return string
     */
    function afterLast($subject, $search)
    {
        if ($search === '') {
            return $subject;
        }

        $position = strrpos($subject, (string) $search);

        if ($position === false) {
            return $subject;
        }

        return substr($subject, $position + strlen($search));
    }
}

if (!function_exists('before')) {
    /**
     * Get the portion of a string before the first occurrence of a given value.
     *
     * @param  string  $subject
     * @param  string  $search
     * @return string
     */
    function before($subject, $search)
    {
        if ($search === '') {
            return $subject;
        }

        $result = strstr($subject, (string) $search, true);

        return $result === false ? $subject : $result;
    }
}

if (!function_exists('beforeLast')) {
    /**
     * Get the portion of a string before the last occurrence of a given value.
     *
     * @param  string  $subject
     * @param  string  $search
     * @return string
     */
    function beforeLast($subject, $search)
    {
        if ($search === '') {
            return $subject;
        }

        $pos = mb_strrpos($subject, $search);

        if ($pos === false) {
            return $subject;
        }

        return substr($subject, 0, $pos);
    }
}

if (!function_exists('startsWith')) {
    /**
     * Determine if a given string starts with a given substring. Case sensitive.
     *
     * @param  string  $haystack
     * @param  string|string[]  $needles
     * @return bool
     */
    function startsWith($haystack, $needles)
    {
        foreach ((array) $needles as $needle) {
            if ((string) $needle !== '' && strncmp($haystack, $needle, strlen($needle)) === 0) {
                return true;
            }
        }

        return false;
    }
}

if (!function_exists('randomHex')) {
    /**
     * Generate random Hex color.
     *
     * @return string
     */
    function randomHex()
    {
        return '#' . strtoupper(str_pad(dechex(rand(0x000000, 0xFFFFFF)), 6, 0, STR_PAD_LEFT));
    }
}

if (!function_exists('decode_base64_image')) {
    /**
     * @param string $base64 String image dalam format base64
     * @param string $name
     * @param string $prefix
     *
     * @return array
     */
    function decode_base64_image($base64, $name, $prefix = 'Signature')
    {
        $ci = &get_instance();
        $ci->load->helper('string');

        $substr = substr($base64, 0, strpos($base64, ';'));
        list($data, $imageTmp) = explode(':', $substr);
        list($imageStr, $extension) = explode('/', $imageTmp);

        $replace = substr($base64, 0, strpos($base64, ',') + 1);
        $image = str_replace($replace, '', $base64);
        $image = str_replace(' ', '+', $image);

        $tempName = snake($name) . '_' . sha1(time() . '_' . random_string());
        $imageName = $prefix . '_' . $tempName . '.' . $extension;

        return [
            'extension' => $extension,
            'imageName' => $imageName,
            'image' => $image,
            'imageDecoded' => base64_decode($image),
        ];
    }
}

if (!function_exists('pretty_json')) {
    /**
     * @param string $json
     *
     * @return string
     */
    function pretty_json($json) {
        // Decode the JSON string into a PHP associative array
        $data = json_decode($json, true);

        // If decoding fails, return an error message
        if ($data === null) {
            return '<pre>Error: Invalid JSON string</pre>';
        }

        // Call the recursive function to process the JSON array
        return '<pre style="font-family: monospace; white-space: pre-wrap; background-color: #000; padding: 10px">' . process_json($data) . '</pre>';
    }
}

if (!function_exists('process_json')) {
    /**
     * @param array $data
     * @param int   $indent
     *
     * @return string
     */
    function process_json($data, $indent = 0) {
        $output = '<span style="color: #FF8400;">';
        $indentation = str_repeat('  ', $indent); // Indentation for pretty print

        if (is_array($data)) {
            $output .= "{\n";
            $indent++;
            foreach ($data as $key => $value) {
                // Print the key with the specific color
                $output .= $indentation . '  <span style="color: #FF4444;">"' . htmlentities($key) . '"</span>: ';

                // Handle nested arrays/objects or print the value
                if (is_array($value)) {
                    $output .= process_json($value, $indent); // Recursive call for nested objects
                } else {
                    // Print the value with the specific color
                    $output .= '<span style="color: #9ED839;">"' . htmlentities($value) . '"</span>';
                }
                $output .= ",\n";
            }
            $output = rtrim($output, ",\n") . "\n";  // Remove the last comma and newline
            $output .= $indentation . '}';
        }

        return $output.'</span>';
    }
}

if (!function_exists('pretty_print_json')) {
    /**
     * @param string $json
     *
     * @return string HTML
     */
    function pretty_print_json($json_data)
    {
        //Initialize variable for adding space
        $space = 0;
        $flag = false;
        //Using <pre> tag to format alignment and font
        $tmp = "<pre>";
        //loop for iterating the full json data
        for ($counter = 0; $counter < strlen($json_data); $counter++) {
            //Checking ending second and third brackets
            if ($json_data[$counter] == '}' || $json_data[$counter] == ']') {
                $space--;
                $tmp .= "\n";
                $tmp .= str_repeat(' ', ($space * 2));
            }

            //Checking for double quote(“) and comma (,)
            if ($json_data[$counter] == '"' && ($json_data[$counter - 1] == ',' || $json_data[$counter - 2] == ',')) {
                $tmp .= "\n";
                $tmp .= str_repeat(' ', ($space * 2));
            }

            if ($json_data[$counter] == '"' && !$flag) {
                if ($json_data[$counter - 1] == ':' || $json_data[$counter - 2] == ':')

                    //Add formatting for question and answer
                    $tmp .= '<span style="color: #9ed839;">';
                else
                    //Add formatting for answer options
                    $tmp .= '<span style="color: #ff4444;">';
            }

            $tmp .= $json_data[$counter];
            //Checking conditions for adding closing span tag
            if ($json_data[$counter] == '"' && $flag)
                $tmp .= '</span>';
            if ($json_data[$counter] == '"')
                $flag = !$flag;
            //Checking starting second and third brackets
            if ($json_data[$counter] == '{' || $json_data[$counter] == '[') {
                $space++;
                $tmp .= "\n";
                $tmp .= str_repeat(' ', ($space * 2));
            }
        }
        $tmp .= "</pre>";
        return $tmp;
    }
}