<?php
/**
 * Created by JetBrains PhpStorm.
 * User: mevis
 * Date: 23.01.15
 * Time: 1:28
 * To change this template use File | Settings | File Templates.
 */

class SiteMapSaver {

    private $xml;
    private $root;
    private $file_number;
    private $nodes_count;
    public $all_nodes_count;
    private $changefreq;
    private $files_path;
    private $curr_date_str;

    public function __construct($file_path, $changefreq = "monthly"){
        $this->files_path = $file_path;
        foreach(glob($file_path.DIRECTORY_SEPARATOR."sitemap*.xml") as $file_name){
            unlink($file_name);
        }
        $this->changefreq = $changefreq;
        $this->file_number = 0;
        $this->all_nodes_count = 0;
        $this->curr_date_str = date("Y-m-d");
        $this->createSiteMap();
    }

    private function createSiteMap(){
        $this->xml = new DOMDocument("1.0", "utf-8");
        $this->xml->formatOutput = True;
        $this->root = $this->xml->createElement("urlset");
        $this->root->setAttribute("xmlns", "http://www.sitemaps.org/schemas/sitemap/0.9");
        $this->root->setAttribute("xmlns:xsi", "http://www.w3.org/2001/XMLSchema-instance");
        $this->root->setAttribute("xsi:schemaLocation", "http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd");
        $this->nodes_count = 0;
        $this->file_number++;
    }

    public function add_url($url, $priority = 0.5){
        if($this->nodes_count == 50000){
            $this->save_part_file();
            $this->createSiteMap();
        }
        $node = $this->xml->createElement("url");
        $node->appendChild($this->xml->createElement("loc", $url));
        $node->appendChild($this->xml->createElement("lastmod", $this->curr_date_str));
        $node->appendChild($this->xml->createElement("changefreq", "monthly"));
        $node->appendChild($this->xml->createElement("priority", $priority));
        $this->root->appendChild($node);
        $this->nodes_count++;
        $this->all_nodes_count++;
    }

    private function save_part_file(){
        $this->xml->appendChild($this->root);
        $this->xml->save($this->files_path.DIRECTORY_SEPARATOR."sitemap{$this->file_number}.xml");
    }

    public function save(){
        if($this->file_number > 1){
            $this->save_part_file();
            $this->xml = new DOMDocument("1.0", "utf-8");
            $this->xml->formatOutput = True;
            $this->root = $this->xml->createElement("sitemapindex");
            $this->root->setAttribute("xmlns", "http://www.sitemaps.org/schemas/sitemap/0.9");
            $this->root->setAttribute("xmlns:xsi", "http://www.w3.org/2001/XMLSchema-instance");
            $this->root->setAttribute("xsi:schemaLocation", "http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/siteindex.xsd");
            for($i = 1; $i <= $this->file_number; $i++){
                $node = $this->xml->createElement("sitemap");
                $node->appendChild($this->xml->createElement("loc", "http://extraload.com.ua/sitemap{$i}.xml"));
                $node->appendChild($this->xml->createElement("lastmod", $this->curr_date_str));
                $this->root->appendChild($node);
            }
            $this->xml->appendChild($this->root);
            $this->xml->save($this->files_path.DIRECTORY_SEPARATOR."sitemap.xml");
        }else{
            $this->xml->appendChild($this->root);
            $this->xml->save($this->files_path.DIRECTORY_SEPARATOR."sitemap.xml");
        }
    }
}