jQuery(document).ready(function(){


    $('#lookup_field').setupPostcodeLookup({
        api_key: 'ak_iwjqbtzymwLtxoprmadH7PYZqQH2Q',
        // Pass in CSS selectors pointing to your input fields
        output_fields: {
            line_1: '#first_line',
            line_2: '#second_line',
            line_3: '#third_line',
            post_town: '#post_town',
            postcode: '#postcode'
        }
    });
});
