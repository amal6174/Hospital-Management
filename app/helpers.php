<?php

if (! function_exists('formatLabel')) {
    /**
     * Convert a snake_case field name to a human-readable label.
     * e.g. "email_for_contact" -> "Email for Contact"
     *      "gst_rate"          -> "GST Rate"
     */
    function formatLabel(string $string): string
    {
        $skipWords      = ['of', 'in', 'for', 'on', 'at', 'to', 'by', 'with', 'and', 'or', 'nor', 'but'];
        $alwaysUpper    = ['gst', 'mrp', 'ipd', 'opd', 'ot', 'icu', 'url'];

        $words = explode('_', strtolower($string));

        return collect($words)
            ->map(function ($word, $index) use ($skipWords, $alwaysUpper) {
                if (in_array($word, $alwaysUpper)) {
                    return strtoupper($word);
                }
                return ($index === 0 || ! in_array($word, $skipWords))
                    ? ucfirst($word)
                    : $word;
            })
            ->implode(' ');
    }
}
