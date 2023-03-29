<?php

namespace MetForm\Core\Entries;

defined('ABSPATH') || exit;

class File_Data_Validation
{
    /**
     * @var mixed
     */
    private static $fields_setting;

    /**
     * @var array
     */
    private static $response = [];

    /**
     * @param $fields_setting
     * @param $file_data
     */
    public static function validate($fields_setting, $file_data)
    {
        self::$fields_setting = $fields_setting;
        foreach ($file_data as $input_name => $file_data) {
            self::file_size_validation($input_name, $file_data);
            self::file_extension_validation($input_name, $file_data);
        }
        return self::$response;
    }

    /**
     * @param $input_name
     * @param $file_data
     */
    private static function file_size_validation($input_name, $file_data)
    {
        $field_setting = self::$fields_setting[$input_name];
        $limit_status  = isset($field_setting->mf_input_file_size_status) && $field_setting->mf_input_file_size_status == 'on' ? true : false;
        if ($limit_status) {
            $file_size_limit = isset($field_setting->mf_input_file_size_limit) ? $field_setting->mf_input_file_size_limit : 128;
            $file_size       = array_sum($file_data['size']) / 1024;
            if ($file_size > $file_size_limit) {
                self::$response[$input_name] = [esc_html__(sprintf("%s size cannot exceed %u kb.", $input_name, $file_size_limit), 'metform')];
            }
        }
    }
    /**
     * @param $input_name
     * @param $file_data
     * @return null
     */
    private static function file_extension_validation($input_name, $file_data)
    {
        $field_setting      = self::$fields_setting[$input_name];
        $allowed_file_types = isset($field_setting->mf_input_file_types) ? $field_setting->mf_input_file_types : ['.jpg', '.jpeg', '.gif', '.png'];
        
        if(is_array($file_data['name'])){
            foreach ($file_data['name'] as $key => $value) {
                $file_extension = '.' . strtolower(pathinfo($value, PATHINFO_EXTENSION));
                if (in_array($file_extension, $allowed_file_types) === true && array_key_exists($file_extension, self::mimes()) === true) {
                    if (function_exists('finfo_open')) {
                        $mime_type = self::mimes()[$file_extension];
    
                        $finfo = finfo_open(FILEINFO_MIME);
                        $mime  = finfo_file($finfo, $file_data['tmp_name'][$key]);
                        finfo_close($finfo);
    
                        if (is_int(strpos($mime, $mime_type['mime']))) {
                            continue;
                        }
                    } else {
                        continue;
                    }
                }
                self::$response[$input_name] = [esc_html__(sprintf("%s only allow %s file types.", $input_name, implode(', ', $allowed_file_types)), 'metform')];
                return;
            }
        }
    }

    /**
     * @return mixed
     */
    private static function mimes()
    {
        $mimes = [
            '.docx' => [
                'mime' => 'application/vnd.openxmlformats-officedocument.wordprocessingml.document'
            ],
            '.png'  => [
                'mime' => 'image/png'
            ],
            '.jpg'  => [
                'mime' => 'image/jpeg'
            ],
            '.jpeg' => [
                'mime' => 'image/jpeg'
            ],
            '.gif'  => [
                'mime' => 'image/gif'
            ],
            '.pdf'  => [
                'mime' => 'application/pdf'
            ],
            '.doc'  => [
                'mime' => 'application/msword'
            ],
            '.icon' => [
                'mime' => 'image/x-icon'
            ],
            '.pptx' => [
                'mime' => 'application/vnd.openxmlformats-officedocument.presentationml.presentation'
            ],
            '.ppt'  => [
                'mime' => 'application/vnd.ms-powerpoint'
            ],
            '.pps'  => [
                'mime' => 'application/vnd.ms-powerpoint'
            ],
            '.ppsx' => [
                'mime' => 'application/vnd.openxmlformats-officedocument.presentationml.presentation'
            ],
            '.odt'  => [
                'mime' => 'application/vnd.oasis.opendocument.text'
            ],
            '.xls'  => [
                'mime' => 'application/vnd.ms-excel'
            ],
            '.xlsx' => [
                'mime' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
            ],
            '.psd'  => [
                'mime' => 'image/vnd.adobe.photoshop'
            ],
            '.mp3'  => [
                'mime' => 'audio/mpeg'
            ],
            '.m4a'  => [
                'mime' => 'audio/x-m4a'
            ],
            '.ogg'  => [
                'mime' => 'audio/ogg'
            ],
            '.wav'  => [
                'mime' => 'audio/x-wav'
            ],
            '.mp4'  => [
                'mime' => 'video/mp4'
            ],
            '.m4v'  => [
                'mime' => 'video/x-m4v'
            ],
            '.mov'  => [
                'mime' => 'video/quicktime'
            ],
            '.wmv'  => [
                'mime' => 'video/x-ms-asf'
            ],
            '.avi'  => [
                'mime' => 'video/x-msvideo'
            ],
            '.mpg'  => [
                'mime' => 'video/mpeg'
            ],
            '.ogv'  => [
                'mime' => 'video/ogg'
            ],
            '.3gp'  => [
                'mime' => 'video/3gpp'
            ],
            '.3g2'  => [
                'mime' => 'video/3gpp2'
            ],
            '.zip'  => [
                'mime' => 'application/zip'
            ],
            '.csv'  => [
                'mime' => 'text/plain'
            ],
            '.stl'  => [
                'mime' => 'application/octet-stream'
            ],
            '.stp'  => [
                'mime' => 'text/plain; charset=us-ascii'
            ]
        ];
        return $mimes;
    }
}