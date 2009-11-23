<?php
require_once 'Rest/Http/Response.php';

/**
* Base class for resources. Override the methods you want to implement.
*
* @package	Resource
* @author	Emmanuel Bouton
*/
abstract class ResourceBase {
	
	private function _notAllowed() {
		return new HttpResponse(HTTP_METHOD_NOT_ALLOWED);
	}
	
	public function callMethod($request) {
	
	    switch ($request->getMethod()) {
	        case HttpMethods::OPTIONS:
	            $response = $this->options($request);
	            break;
	        case HttpMethods::GET:
	            $response = $this->get($request);
	            break;
	        case HttpMethods::HEAD:
	            $response = $this->head($request);
	            break;
	        case HttpMethods::POST:
	            $response = $this->post($request);
	            break;
	        case HttpMethods::PUT:
	            $response = $this->put($request);
	            break;
	        case HttpMethods::DELETE:
	            $response = $this->delete($request);
	            break;
	        case HttpMethods::TRACE:
	            $response = $this->trace($request);
	            break;
	        case HttpMethods::CONNECT:
	            $response = $this->connect($request);
	            break;
	        default:
	            $response = new HttpResponse(HTTP_BAD_REQUEST);
	            break;
	    }
	    return $response;
	}

	protected function options($request) {
		return $this->_notAllowed();
	}

	protected function get($request) {
		return $this->_notAllowed();
	}

	protected function head($request) {
		return $this->_notAllowed();
	}

	protected function post($request) {
		return $this->_notAllowed();
	}

	protected function put($request) {
		return $this->_notAllowed();
	}

	protected function delete($request) {
		return $this->_notAllowed();
	}

	protected function trace($request) {
		return $this->_notAllowed();
	}

	protected function connect($request) {
		return $this->_notAllowed();
	}
}