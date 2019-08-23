<?php

class Pager {
    
    private $max = 10; // amount links at one time 
    private $index = '_'; // key for GET, where writen num of page
    private $current_page;
    private $total; // all notes by category
    private $limit; // dispalyed notes 
    
    public function __construct($index, $currentPage, $total, $limit) {
        $this->total = $total; // total amount in category 
        $this->limit = $limit; // sets amount at page 
        $this->index = $index; // sets key to url 
        $this->amount = $this->amount(); // calculates amount of pages 
        $this->setCurrentPage($currentPage); // sets the current page
    }

    public function get() {  // returns HTML-code with navigation links 
        
        $links = null; 

        $limits = $this->limits(); // array of 2 elements for prev and next links 
        
        $html = '<ul class="pagination">';

        for ($page = $limits[0]; $page <= $limits[1]; $page++) {
            if ($page == $this->current_page) {
                $links .= '<li class="active"><a href="#">' . $page . '</a></li>';
            } else {
                $links .= $this->generateHtml($page);
            }
        }

        if (!is_null($links)) {

            if ($this->current_page > 1) { // if current not first 
                $links = $this->generateHtml(1, '&lt;').$links; // link to first
            }
            if ($this->current_page < $this->amount) { // if current not first 
                $links .= $this->generateHtml($this->amount, '&gt;'); // link to last 
            }
        }
        $html .= $links . '</ul>';

        return $html;
    }

    private function generateHtml($page, $text = null) {
        if (!$text) { // if text is not defined
            $text = $page; // sets test as number 
        }
        $currentURI = rtrim($_SERVER['REQUEST_URI'], '/') . '/';
        $currentURI = preg_replace('~/'.$this->index.'[0-9]+~', '', $currentURI);

        return '<li><a href="' . $currentURI . $this->index . $page . '">' . $text . '</a></li>';
    }

    private function limits() {  // array with start and end of count 

        $left = $this->current_page - round($this->max / 2); // calclates left links (to active appears in the middle) 
        
        $start = $left > 0 ? $left : 1; // Вычисляем начало отсчёта

        if ($start + $this->max <= $this->amount) { // if towards exist at last $this->max pages
            $end = $start > 1 ? $start + $this->max : $this->max; // sets end of loop forward on $this->max pages or on min
        } else {
            $end = $this->amount;
            $start = $this->amount - $this->max > 0 ? $this->amount - $this->max : 1;
        }
        return array($start, $end);
    }

    private function setCurrentPage($currentPage)
    {
        $this->current_page = $currentPage;

        if ($this->current_page > 0) {
            if ($this->current_page > $this->amount) {
                $this->current_page = $this->amount;
            }
        } else {
            $this->current_page = 1;
        }
    }

    private function amount() {
        return ceil($this->total / $this->limit);
    }

}







