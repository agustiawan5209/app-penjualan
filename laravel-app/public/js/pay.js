// $(document).ready(function() {
//     var submit = $("#submitPay");

//     $.each($("#submitPay").find('input'), function(indexInArray, valueOfElement) {
//         $(valueOfElement).change(function() {
//             if (valueOfElement.value == '') {
//                 // valueOfElement.classList.value = 'is-invalid';
//                 valueOfElement.classList.toggle('is-invalid')
//             } else {
//                 // valueOfElement.classList.value = 'is-valid';
//                 valueOfElement.classList.toggle('is-valid')
//             }
//         })
//     });
//     $("#submitPay").submit(function(e) {

//         e.preventDefault(); // avoid to execute the actual submit of the form.
//         // alert('dada')
//         var form = $(this);
//         var actionUrl = form.attr('action');

//         $.ajax({
//             type: "POST",
//             url: actionUrl,
//             data: form.serialize(), // serializes the form's elements.
//             success: function(data) {
//                 alert(data)
//             },
//             error: function(data) {
//                 $.each($("#submitPay").find('input'), function(indexInArray, valueOfElement) {
//                     if (valueOfElement.value == '') {
//                         // valueOfElement.classList.value = 'is-invalid';
//                         valueOfElement.classList.toggle('is-invalid')
//                         valueOfElement.classList.remove('is-valid')
//                     } else {
//                         // valueOfElement.classList.value = 'is-valid';
//                         valueOfElement.classList.remove('is-invalid')
//                         valueOfElement.classList.toggle('is-valid')
//                     }
//                 });
//             },
//         });

//     });
// });