<?php

/**
 * Base Class for resources. Override the methods you want to implement.
 *
 * @package	simplerest.resource
 * @author	Emmanuel Bouton
 */
abstract class Resource {
	
	protected $_request;
	protected $_response;
	
	function __construct($request) {
		$this->_request = $request;
		$this->_response = new HttpResponse();
	}
	
	public function callMethod() {
	
	    switch ($this->_request->getMethod()) {
	        case HttpMethods::OPTIONS:
	            $representation = $this->options();
	            break;
	        case HttpMethods::GET:
	            $representation = $this->get();
	            break;
	        case HttpMethods::HEAD:
	            $representation = $this->head();
	            break;
	        case HttpMethods::POST:
	            $representation = $this->post();
	            break;
	        case HttpMethods::PUT:
	            $representation = $this->put();
	            break;
	        case HttpMethods::DELETE:
	            $representation = $this->delete();
	            break;
	        case HttpMethods::TRACE:
	            $representation = $this->trace();
	            break;
	        case HttpMethods::CONNECT:
	            $representation = $this->connect();
	            break;
	        default:
	            $this->_response->setStatus(HttpStatus::HTTP_BAD_REQUEST);
	            break;
	    }
	    return $this->_response;
	}
	
	protected function setStatus($status)
	{
	    $this->_response->setStatus($status);
	}
	
	protected function setContent($content)
	{
	    $this->_response->setContent($content);
	}
	
	private function _notAllowed() {
		$this->_response->setStatus(HttpStatus::HTTP_METHOD_NOT_ALLOWED);
		return null;
	}

	protected function options() {
		return $this->_notAllowed();
	}

	protected function get() {
		return $this->_notAllowed();
	}

	protected function head() {
		return $this->_notAllowed();
	}

	protected function post() {
		return $this->_notAllowed();
	}

	protected function put() {
		return $this->_notAllowed();
	}

	protected function delete() {
		return $this->_notAllowed();
	}

	protected function trace() {
		return $this->_notAllowed();
	}

	protected function connect() {
		return $this->_notAllowed();
	}
}
