<?php

namespace bfModalPlugin\filters;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

use WP_REST_Request;
use WP_REST_Response;
use bfModalPlugin\helpers\BFModalReturnUrlHelper;
use bfModalPlugin\providers\BFPartialDataProvider;

class BFPopulateModalFilter extends BFBaseFilter {
	public function populate_modal( WP_REST_Request $request ): WP_REST_Response {
		$query_params = $this->get_request_params( $request, array(
			array( 'page_id', null ),
			array( 'return_url', '' ),
		) );

		$modal = '';
		if ( ! empty( $query_params['page_id'] ) ) {
			$modal = $this->get_modal( (int) $query_params['page_id'], (string) $query_params['return_url'] );
		}

		$url = get_permalink( $query_params['page_id'] );

		$response_data = array(
			'html' => $modal,
			'url'  => $url,
		);

		$response = new WP_REST_Response( $response_data );
		$response->set_status( 200 );

		return $response;
	}

	public function get_modal( int $post_data_id, string $return_url = '' ): string {
		ob_start();
		ob_implicit_flush( 0 );

		if ( empty( $return_url ) ) {
			$bf_modal_return_url_helper = new BFModalReturnUrlHelper();
			$return_url                 = $bf_modal_return_url_helper->get_return_url( $post_data_id );
		}

		$bf_partial_data_provider = new BFPartialDataProvider();
		$override_modal           = $bf_partial_data_provider->get_override_modal_partial_if_exists( array(
			'post_data_id' => $post_data_id,
			'return_url'   => $return_url,
		) );

		if ( ! empty( $override_modal ) ) {
			load_template( $override_modal, true, array(
				'post_data_id' => $post_data_id,
				'return_url'   => $return_url,
			) );
		} else {
			bfml_get_template( 'modal-inner', array(
				'post_data_id' => $post_data_id,
				'return_url'   => $return_url,
			) );
		}

		return ob_get_clean();
	}
}
