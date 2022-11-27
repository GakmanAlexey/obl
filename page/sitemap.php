<?php

namespace Page;

Class Sitemap{
    public function main(){
        echo '<?xml version="1.0" encoding="UTF-8"?>';
        echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';

        
        echo '<url>';        
        echo '   <loc>http://www.example.com/</loc>';        
        echo '   <lastmod>2005-01-01</lastmod>';        
        echo '</url>';

        
        echo '</urlset> ';
        



    }
};