<?php
    $parts = ['header', 'sidebar', 'navbar', 'content', 'footer'];
foreach ($parts as $part)
{
    if (!in_array($part, $excluded_parts)) {
        if ($part == 'header') {
            $this->load->view($module . 'includes/header', ['title' => $title]);
        }
        elseif ($part == 'content') {
            $this->load->view($content);
        }
        else
        {
            $this->load->view($module . 'includes/' . $part);
        }
    }
}
?>
