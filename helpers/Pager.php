<?php

class Pager {

    /**
     * @var int amount links at one time
     */
    private $max = 10;

    /**
     * @var string key for GET, where written num of page
     */
    private $index = '_';

    private $current_page;

    /**
     * @var int all items by category
     */
    private $total;

    /**
     * @var int amount of displayed items
     */
    private $limit;

    /**
     * Pager constructor.
     * @param $index - sets key to url
     * @param $currentPage - calculates amount of pages
     * @param $total - total amount in category
     * @param $limit - sets amount at page
     */
    public function __construct($index, $currentPage, $total, $limit) {
        $this->total = $total;
        $this->limit = $limit;
        $this->index = $index;
        $this->amount = $this->amount();
        $this->setCurrentPage($currentPage); // Keep the current page in corresponding boundaries
    }

    /**
     * Widget as an html-code with navigation links
     * @return string
     */
    public function get() {
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

    /**
     * @return array with start and end of count
     */
    private function limits() {
        // calculates left links (to active appears in the middle)
        $left = $this->current_page - round($this->max / 2);
        // counting beginning
        $start = $left > 0 ? $left : 1;
        // if towards exist at last $this->max pages
        if ($start + $this->max <= $this->amount) {
            $end = $start > 1 ? $start + $this->max : $this->max; // sets end of loop forward on $this->max pages or on min
        } else {
            $end = $this->amount;
            $start = $this->amount - $this->max > 0 ? $this->amount - $this->max : 1;
        }
        return array($start, $end);
    }

    /**
     * Keep the current page in corresponding boundaries
     * @param $currentPage int same as parameter
     */
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

    /**
     * @return float
     */
    private function amount() {
        return ceil($this->total / $this->limit);
    }

}







