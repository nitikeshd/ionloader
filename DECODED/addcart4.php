<?php
/*********************/
/*   IonCube Priv8 Decoder V1 By H@CK3R $2H    */
/*         Version  : 1       */
/* Author   : H@CK3R $2H */
/*        Release on : 14-Feb-2014        */
/*      Email  : Hacker.S2h@Gmail.com    */
/*********************/

ob_start( );
session_start( );
require_once( "inc/page.php" );
require_once( "inc/db.php" );
require( "inc/config.php" );
require( "inc/libs/Smarty.class.php" );
$_GET['id'] = $_GET['id'];
$_GET['opt'] = ( integer );
if ( $_GET['opt'] )
{
    $_GET['id'] = $_GET['id']."^".$_GET['opt'];
}
if ( $post_panel_type == 2 )
{
    header( "Location: ".$post_panel_webservice_url."/customers/start.php?co_id=".$post_panel_username."&p_id=10&prd_id=".$ppeykid."&pin=".$post_panel_password );
    exit( );
}
if ( $xshop_cart_system == 1 )
{
}
else if ( $xshop_cart_system == 2 )
{
}
switch ( $action )
{
    case "add" :
        if ( $cart )
        {
            $cart .= "|".$_GET['id'];
        }
        else
        {
        }
        break;
    case "delete" :
        if ( $cart )
        {
            $newcart = "";
            foreach ( $items as $item )
            {
                if ( !( $_GET['id'] != $item ) )
                {
                    continue;
                }
                else if ( $newcart != "" )
                {
                    $newcart .= "|".$item;
                }
                else
                {
                }
            }
        }
        break;
    case "update" :
        if ( $cart )
        {
            $newcart = "";
            foreach ( $_POST as $key => $value )
            {
                if ( stristr( $key, "qty" ) )
                {
                    $items = $newcart != "" ? explode( "|", $newcart ) : explode( "|", $cart );
                    $newcart = "";
                    foreach ( $items as $item )
                    {
                        if ( !( $id != $item ) )
                        {
                            continue;
                        }
                        else if ( $newcart != "" )
                        {
                            $newcart .= "|".$item;
                        }
                        else
                        {
                        }
                    }
                    $i = 10;
                    do
                    {
                        if ( $i <= $value )
                        {
                            if ( $newcart != "" )
                            {
                                $newcart .= "|".$id;
                            }
                            else
                            {
                            }
                            ++$i;
                        }
                    } while ( 1 );
                }
            }
        }
}
setcookie( "cart", $cart, time( ) + 3600 );
$_SESSION['cart'] = $cart;
header( "Location: cart.php" );
?>
