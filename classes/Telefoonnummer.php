<?php

/**
 * Format the Dutch telephone number
 *
 * @author Denver Sessink (dsessink@gmail.com)
 */
class Telefoonnummer {

	/** @var array $netnummers source: https://nl.wikipedia.org/wiki/Lijst_van_Nederlandse_netnummers */
	private static $netnummers
		= array(
			/* Geografische netnummers */
			"010",
			"0111",
			"0113",
			"0114",
			"0115",
			"0117",
			"0118",
			"013",
			"014",
			"015",
			"0161",
			"0162",
			"0164",
			"0165",
			"0166",
			"0167",
			"0168",
			"0172",
			"0174",
			"0180",
			"0181",
			"0182",
			"0183",
			"0184",
			"0186",
			"0187",
			"020",
			"0222",
			"0223",
			"0224",
			"0226",
			"0227",
			"0228",
			"0229",
			"023",
			"024",
			"0251",
			"0252",
			"0255",
			"026",
			"0294",
			"0297",
			"0299",
			"030",
			"0313",
			"0314",
			"0315",
			"0316",
			"0317",
			"0318",
			"0320",
			"0321",
			"033",
			"0341",
			"0342",
			"0343",
			"0344",
			"0345",
			"0346",
			"0347",
			"0348",
			"035",
			"036",
			"038",
			"040",
			"0411",
			"0412",
			"0413",
			"0416",
			"0418",
			"043",
			"045",
			"046",
			"0475",
			"0478",
			"0481",
			"0485",
			"0486",
			"0487",
			"0488",
			"0492",
			"0493",
			"0495",
			"0497",
			"0499",
			"050",
			"0511",
			"0512",
			"0513",
			"0514",
			"0515",
			"0516",
			"0517",
			"0518",
			"0519",
			"0521",
			"0522",
			"0523",
			"0524",
			"0525",
			"0527",
			"0528",
			"0529",
			"053",
			"0541",
			"0543",
			"0544",
			"0545",
			"0546",
			"0547",
			"0548",
			"055",
			"0561",
			"0562",
			"0566",
			"0570",
			"0571",
			"0572",
			"0573",
			"0575",
			"0577",
			"0578",
			"058",
			"0591",
			"0592",
			"0593",
			"0594",
			"0595",
			"0596",
			"0597",
			"0598",
			"0599",
			"070",
			"071",
			"072",
			"073",
			"074",
			"075",
			"076",
			"077",
			"078",
			"079",

			/* Niet-geografische nummers */

		    "061", /* Mobiele nummers */
		    "062", /* Mobiele nummers */
		    "063", /* Mobiele nummers */
		    "064", /* Mobiele nummers */
		    "065", /* Mobiele nummers */

		    "068", /* Mobiele nummers */
		    "069", /* Mobiele nummers */

		    "066", /* Semafonie */

		    "0670", /* Videotex */
		    "0671", /* Videotex */
		    "0672", /* Videotex */
		    "0673", /* Videotex */
		    "0674", /* Videotex */
		    "0675", /* Videotex */

		    "0676", /* Inbelnummers van internetproviders */

		    "0800", /* Gratis informatienummers */

		    "082", /* Virtual Private Network */

		    "088", /* Bedrijfsnummers */

		    "0900", /* Betaalde informatienummers */
		    "0906", /* Betaalde informatienummers */
		    "0909", /* Betaalde informatienummers */

		    "091", /* Plaatsonafhankelijk netnummer, geschikt voor beeldtelefonie of lijnen met verhoogde kwaliteit  */
		);

	/**
	 * @param string $telefoonnummer
	 *
	 * @return string
	 */
	public static function format( $telefoonnummer ) {
		preg_match_all( "/[0-9]/", $telefoonnummer, $matches );
		if ( is_array( $matches ) && isset( $matches[0] ) ) {
			$telefoonnummer = implode( "", $matches[0] );
		}

		return $telefoonnummer;
	}

	/**
	 * @param string $telefoonnummer
	 *
	 * @return string
	 */
	public static function beautify( $telefoonnummer, $beautify_separator = " " ) {
		$telefoonnummer = Telefoonnummer::format( $telefoonnummer );

		foreach ( Telefoonnummer::$netnummers as $netnummer ) {
			if ( preg_match( "/^" . $netnummer . "/", $telefoonnummer, $matches ) ) {
				$telefoonnummer = preg_replace( "/^" . $netnummer . "/", $netnummer . $beautify_separator,
					$telefoonnummer );
				break;
			}
		}

		return $telefoonnummer;
	}
}