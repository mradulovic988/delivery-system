/**
 * Conditional redirection
 *
 * @author Marko Radulovic
 * @since 1.0.0
 * @version 1.0.0
 */

"use strict";

if(window.location.href == "https://www.cantineverte.ch/produit/weekly-bundle/" && ! localStorage.getItem("successPostcode")){
    window.location.href = "https://www.cantineverte.ch/";
}