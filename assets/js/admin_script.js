/**
 * Admin init for the project
 *
 * @author Marko Radulovic
 * @since 1.0.0
 * @version 1.0.0
 */

'use strict';

/**
 * Getting element by ID
 *
 * @param id string Passing param for the data
 * @returns {HTMLElement}
 */
if(document.querySelector('body').classList.contains('post-type-product')) {

    const checkElementId = (id) => document.getElementById(id);
    /**
     * Copying fields from theme to ACF
     *
     * @param nutritionFields array Passing parameters for copying data
     */
    window.onload = () => {
        const nutritionFields = [
            'madang_calories',
            'acf-field_5fa9a4d415448',
            'madang_proteins',
            'acf-field_5fa9a4f415449',
            'madang_fats',
            'acf-field_5fa9a4fd1544a',
            'madang_carbohydrates',
            'acf-field_5fa9a5041544b'
        ];

        checkElementId('acf-group_5fa9a4ad653c1').style.display = "none";

        checkElementId(nutritionFields[0]).addEventListener('input', () => {
            checkElementId(nutritionFields[1]).value = checkElementId(nutritionFields[0]).value;
        });

        checkElementId(nutritionFields[2]).addEventListener('input', () => {
            checkElementId(nutritionFields[3]).value = checkElementId(nutritionFields[2]).value;
        });

        checkElementId(nutritionFields[4]).addEventListener('input', () => {
            checkElementId(nutritionFields[5]).value = checkElementId(nutritionFields[4]).value;
        });

        checkElementId(nutritionFields[6]).addEventListener('input', () => {
            checkElementId(nutritionFields[7]).value = checkElementId(nutritionFields[6]).value;
        });
    }
}
