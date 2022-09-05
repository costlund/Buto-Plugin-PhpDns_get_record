<?php
class PluginPhpDns_get_record{
  public function widget_get($data){
    $data = new PluginWfArray($data);
    /**
     * if not set we get posted hostname or current hostname.
     */
    if(!$data->get('data/hostname')){
      if(wfRequest::get('hostname')){
        $data->set('data/hostname', wfRequest::get('hostname'));
      }else{
        $data->set('data/hostname', wfServer::getHttpHost());
      }
    }
    /**
     * 
     */
    $record = dns_get_record($data->get('data/hostname'));
    $element = array();
    foreach($record as $v){
      $i = new PluginWfArray($v);
      $element[] = wfDocument::createHtmlElement('h2', array(
        wfDocument::createHtmlElement('span', $i->get('host')),
        wfDocument::createHtmlElement('span', '-'),
        wfDocument::createHtmlElement('span', $i->get('class')),
        wfDocument::createHtmlElement('span', '-'),
        wfDocument::createHtmlElement('span', $i->get('ttl')),
        wfDocument::createHtmlElement('span', '-'),
        wfDocument::createHtmlElement('span', $i->get('type'))
      ));
      $element[] = wfDocument::createWidget('wf/table', 'render_one', array('rs' => $v)); 
    }
    wfDocument::renderElement($element);
  }
}
