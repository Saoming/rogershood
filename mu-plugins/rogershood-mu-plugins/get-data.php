<?php
/**
 * Holds procedural data getters.
 *
 * @package RogersHood\Data
 */
namespace RogersHood\Data;

// rest api
// getter functions
// store functions

\defined( 'ABSPATH' ) or die;

// function get_transient_name( $site ) {
//     return "storedata-$site";
//  }

// function get_data( $site = 'home' ) {
//     switch ( $site ) {
//         case 'home':
//           $data = get_transient( "storedata-$site" );
//           $data['siteurl'] = get_site_url( 1 ); // do not use this
//           // rest api
//           break;
//         case 'store':
//             $data = get_transient( "storedata-$site" );
//             break;
//         case 'learn':
//                 $data = get_transient( "storedata-$site" );
//                 break;
//        case 'support':
//           $data = get_transient( "storedata-$site" );
//           break;
//     }
    
//     if ( false === $data ) {
//         $data = get_data_via_rest( $site );
//      }

//     return $data;
//  }

//  function get_data_via_rest( $site ) {

//     /// fill data here

//     $data = 0;
 
//     store_data( $site, $data );
 
//     return $data;
//  } 

 
//  function store_data( $site, $data ) {
//     set_transient( get_transient_name( $site ), $data, MINUTE_IN_SECONDS );
//  }