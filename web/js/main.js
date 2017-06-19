jQuery(document).ready(function(){

    
    $( function() {
        $( "#tabs" ).tabs();
    } );

    $('#lookup_field').setupPostcodeLookup({
        api_key: 'ak_iwjqbtzymwLtxoprmadH7PYZqQH2Q',
        // Pass in CSS selectors pointing to your input fields
        output_fields: {
            line_1: '#form_addresslineone',
            line_2: '#form_addresslinetwo',
            line_3: '#form_addresslinethree',
            post_town: '#form_postcity',
            postcode: '#form_postalcode',
            county: '#form_county',
            country: '#form_country'
        }
    });
});
