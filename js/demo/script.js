// string / text convert to slug //

$("#name").keyup(function() {
  let str = $(this).val().toLowerCase().replace(/\s+/g, '-').replace(/[^\w\-]+/g, ' ');
  $("#slug").val(str);        
});

$("#title").keyup(function() {
  let str = $(this).val().toLowerCase().replace(/\s+/g, '-').replace(/[^\w\-]+/g, ' ');
  $("#slug").val(str);        
});


// CKEditor //

ClassicEditor.create();

 // ClassicEditor
 //        .create( document.querySelector( '#editor' ) )
 //        .catch( error => {
 //            console.error( error );
 //        } ); 





// ================================== //
// Explain Each Line In Details Below
// ================================== //  

// stringToSlug(str) : This function takes a string (str) as input and converts it into a slug
//
//
// str.toLowerCase(); :  Converts the entire string to lowercase. 
//
//
// str.replace(/\s+/g, '-'); : Replace all occurrences of whitspasce (\s+) with hyphens(-) 
//  \s+ = this part matches any whitespace character(spaces, tabs, newline etc.) one or more times(+). So, it will find any sequence of whitespace characters
//  g =  it stands for "global" and tells the replace() meethod to replace all occurrence of the pattern, not just the  first one.
// 
//
// str.replace(/[^\w\-]+/g, ' '); : Removes any characters that are not alphanumeric (\w) or hyphens (-). 
// [](square bracket) = brackets enclose a character class, which is a way to represent a set of characters that you want to match.
//  [^\w\-] (character class);
//  ^ = this symble beginning indicates that we want to match.
//  \w = represents shorthand character class that matches any alphanumeric character (letters a-z, A-Z, and numbers 0-9).
//  \- =  represents a hyphen character.
//  + (Plus Sign) = This quantifier indicates that the preceding character class ([^\w\-]+) can be matched one or more times. 
//  g(Global Flag) = this is a flag appended to the regular expression pattern. 
 //It tells the replace method to replace all occurrences of the matched pattern within the string, not just the first one.
