<?php
    class BlockRecorder {
        function __construct() {
            $this->blocks = [];
            $this->index = 0;
            $this->first_block = null;
            $this->last_block = null;
            $this->parsed_blocks = parse_blocks(get_the_content());

            foreach($this->parsed_blocks as $parsed_block) {
                if(!empty($parsed_block['blockName'])) {
                    $this->blocks[] = $this->getBlockName($parsed_block['blockName']);
                }
            }

            if(sizeof($this->blocks) > 0) {
                $this->first_block = $this->blocks[0];
                $this->last_block = $this->blocks[sizeof($this->blocks)];
            }
        }

        function getBlockName($full_block_name) {
            return str_replace('acf/custom-blocks-', '', $full_block_name);
        }

        function pop($block = []) {
            if(!empty($block) && empty($block['blockName'])) {
                return;
            }

            if($this->index == 0) {
                $this->previous_block = null;
            } else {
                $this->previous_block = $this->blocks[$this->index - 1];
            }

            if($this->index == sizeof($this->blocks)) {
                $this->next_block = null;
            } else {
                $this->next_block = $this->blocks[$this->index + 1];
            }

            $this->index += 1;
        }
    }
