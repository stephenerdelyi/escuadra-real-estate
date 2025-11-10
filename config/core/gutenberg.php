<?php
    function block_wrapper($block_content, $block) {
        if($block['blockName'] === 'core/paragraph' && !empty($block_content)) {
            $content = '<div class="wp-block-paragraph">';
            $content .= $block_content;
            $content .= '</div>';
            return $content;
        } else if($block['blockName'] === 'core/heading') {
            $content = '<div class="wp-block-heading">';
            $content .= $block_content;
            $content .= '</div>';
            return $content;
        } else if($block['blockName'] === 'core/list') {
            $content = '<div class="wp-block-list">';
            $content .= $block_content;
            $content .= '</div>';
            return $content;
        }

        return $block_content;
    }

    function empty_paragraph_killer($block_content, $block) {
        if($block['blockName'] === 'core/paragraph' && trim($block_content) == '<p></p>') {
            return '';
        }

        return $block_content;
    }

    add_filter('render_block', 'empty_paragraph_killer', 10, 2);
    add_filter('render_block', 'block_wrapper', 10, 2);
