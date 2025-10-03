<?php

if (! function_exists('format_greentext')) {
    function format_greentext($text) {
        $lines = explode("\n", $text);
        $formattedLines = array_map(function ($line) {
            if (str_starts_with($line, '>')) {
                return '<span class="text-green-700">' . e($line) . '</span>';
            }
            return e($line);
        }, $lines);
        return implode("\n", $formattedLines);
    }
}