// form validation  (jquery validation plugin)
$(function () {
    //this invoking function for stepper
    (function () {
        const stepButtons = document.querySelectorAll('.step-button');
        let fieldsetToHide, fieldsetToShow;
        let animating;
        // $('.step-button').click(function () {
        //     if (!$('#item-form').valid()) {
        //         return
        //     }
        //     let index = +$(this).data('index')
        //     if (index === 2 && $('#item-form').valid()) {
        //         console.log($('#item-form').valid())
        //         renderSummary();
        //     } else {
        //         alert('test');
        //     }
        //     $('#progress').attr('value', index * 100 / (stepButtons.length - 1));//there are 3 buttons. 2 spaces.
        //     stepButtons.forEach((item, secindex) => {
        //         if (index >= secindex) {
        //             $(item).addClass('active')
        //         }
        //         if (index < secindex) {
        //             $(item).removeClass('active')
        //         }
        //     })
        //     $('fieldset').hide();
        //     $($('fieldset').toArray()[index]).show()
        // });
        $('.next,.previous').click(function () {
            if (!$('#item-form').valid()) {
                return false;
            }
            let index = +$(this).data('index')

            if (animating) {
                return false;
            }
            animating = true;

            //last page in stepper
            if (index === 2) {
                renderSummary()
            }
            fieldsetToHide = $(this).parent();
            if ($(this).hasClass('previous')) {
                fieldsetToShow = $(this).parent().prev();
            } else {
                fieldsetToShow = $(this).parent().next();
            }
            $('#progress').attr('value', index * 100 / (stepButtons.length - 1));
            fieldsetToShow.show();
            fieldsetToHide.hide();
            stepButtons.forEach((item, secindex) => {
                if (index >= secindex) {
                    $(item).addClass('active')
                }
                if (index < secindex) {
                    $(item).removeClass('active')
                }
            })
            animating = false
        })
    })();
})


function renderSummary() {
    const nameInput = $('input[name^="name"]');
    const barcodeInput = $('input[name^="barcode"]');
    const typeInput = $('select[name^="type"]').select2('data');
    const statusInput = $('select[name^="status"]').select2('data');
    const categoryInput = $('select[name^="category"]').select2('data');
    const purchasingPriceInput = $('input[name^="purchasing_price"]');
    const hasFixedPriceInput = $('input[name^="has_fixed_price"]');
    const mainUnitInput = $('select[name^="main_unit"]').select2('data');
    const mainUnitWholesalePricesInput = $('input[name^="main_unit_wholesale_price"]');
    const mainUnitHalfWholesalePricesInput = $('input[name^="main_unit_half_wholesale_price"]');
    const mainUnitConsumerPricesInput = $('input[name^="main_unit_consumer_price"]');
    const secondaryUnitsInput = $('select[name^="secondary_unit[]"]');
    const wholesalePricesInput = $('input[name^="wholesale_price[]"]');
    const halfWholesalePricesInput = $('input[name^="half_wholesale_price[]"]');
    const consumerPriceInput = $('input[name^="consumer_price[]"]');
    const percentageInput = $('input[name^="percentage[]"]');

    $("p#name").text(nameInput.val());
    $("p#barcode").text(barcodeInput.val());
    $("p#type").text(typeInput[0]?.text);
    if (+typeInput[0]?.id === 0) {
        $("p#type").addClass('text-primary')
    } else {
        $("p#type").addClass('text-success')
    }
    if (statusInput[0]?.id === 0) {
        $("p#status").addClass('text-danger')
    } else {
        $("p#status").addClass('text-primary')
    }
    $("p#status").text(statusInput[0]?.text);
    $("p#category").text(categoryInput[0]?.text);
    $("p#purchasing_price").text(purchasingPriceInput.val());
    $("p#has_fixed_price").text(hasFixedPriceInput.is(":checked"));
    $("p#main_unit").text(mainUnitInput[0]?.text);
    $("td#main_unit_wholesale_price").text(mainUnitWholesalePricesInput.val());
    $("td#main_unit_half_wholesale_price").text(mainUnitHalfWholesalePricesInput.val());
    $("td#main_unit_consumer_price").text(mainUnitConsumerPricesInput.val());
    $('fieldset#summary > ul > section').html('')
    secondaryUnitsInput.each((i, secondaryUnit) => {
        secondaryUnit = $(secondaryUnit).select2('data');
        let secondaryUnitTemplate = renderSecondaryUnit(secondaryUnit[0]?.text, $(percentageInput[i]).val(), $(wholesalePricesInput[i]).val(), $(halfWholesalePricesInput[i]).val(), $(consumerPriceInput[i]).val());
        $('fieldset#summary > ul > section').append(secondaryUnitTemplate);
    });
}

$('#item-form input#item-img').change((event) => {
    const output = $('img#image');
    output.attr('src', URL.createObjectURL(event.target.files[0]));
    output.onload = function () {
        URL.revokeObjectURL(output.src)
    }
})

function renderSecondaryUnit(unit, percentage, wholesalePrice, halfWholesalePrice, consumerPrice) {
    return `
<li class="list-group-item">
    <div class="d-flex justify-content-center mt-2">
        <h4 class="" id="">Secondary unit :</h4>
        <p class="h4" id="secondary_unit">${unit} <span>(${percentage}%)</span></p>
    </div>
    <table class="table table-responsive text-center table-borderless">
        <thead>
            <th>Wholesale price</th>
            <th>Half wholesale price</th>
            <th>Consumer price</th>
        </thead>
        <tbody>
            <td id="wholesale_price">${wholesalePrice}</td>
            <td id="half_wholesale_price">${halfWholesalePrice}</td>
            <td id="consumer_price">${consumerPrice}</td>
        </tbody>
    </table>
</li>`;
}

//delete secondary element
$("body").on('click', 'button#delete-secondary-unit', function () {
    $(this).parent('fieldset').remove()
});

$('#add-secondary-units').click(createSecondaryUnitElement);

function createSecondaryUnitElement() {
    let index = $('#secondary-units fieldset').length + 1;
    $('#secondary-units').append(`
 <fieldset class="mb-2">
   <div class="row">
      <div class="col-8">
         <div class="mb-3">
            <label for="secondary_unit" class="form-label">Secondary Unit</label>
            <select class="form-control" id="secondary_unit${index}" name="secondary_unit[]">

            </select>
         </div>
      </div>
      <div class="col-4">
         <div class="mb-3">
            <label for="percentage" class="form-label">Percentage</label>
            <input type="number" min="0" class="form-control" id="percentage"
               name="percentage[]"
               value="{{old('percentage')}}">
         </div>
      </div>
   </div>
   <div class="row">
      <div class="col-4">
         <div class="mb-3">
            <label for="wholesale_price" class="form-label">Wholesale price</label>
            <input type="number" min="0" class="form-control" id="wholesale_price"
               name="wholesale_price[]"
               value="{{old('wholesale_price')}}">
         </div>
      </div>
      <div class="col-4">
         <div class="mb-3">
            <label for="half_wholesale_price" class="form-label">Half wholesale price</label>
            <input type="number" min="0" class="form-control" id="half_wholesale_price"
               name="half_wholesale_price[]"
               value="{{old('half_wholesale_price')}}">
         </div>
      </div>
      <div class="col-4">
         <div class="mb-3">
            <label for="consumer_price" class="form-label">Consumer price</label>
            <input type="number" min="0" class="form-control" id="consumer_price"
               name="consumer_price[]"
               value="{{old('consumer_price')}}">
         </div>
      </div>
   </div>
   <button class ="btn btn-danger" data-index=${index - 1}  type="button" id="delete-secondary-unit"><span class="material-icons">delete</span></button>
</fieldset>
`)

    $(`#secondary_unit${index}`).select2({
        theme: "bootstrap-5", ajax: {
            url: 'http://localhost:8000/api/secondary-unit', dataType: 'json', processResults: function (data) {
                return {
                    results: data
                };
            }
        },
    })

    $('select[name^="secondary_unit[]"]').each(function () {
        $(this).rules('add', {required: true})
    });
    $('input[name^="percentage[]"]').each(function () {
        $(this).rules('add', {required: true})
    });
    $('input[name^="wholesale_price[]"]').each(function () {
        $(this).rules('add', {required: true})
    })
    $('input[name^="half_wholesale_price[]"]').each(function () {
        $(this).rules('add', {required: true})
    })
    $('input[name^="consumer_price[]"]').each(function () {
        $(this).rules('add', {required: true})
    })



}
$('#item-form').validate({
    errorClass: 'text-danger', rules: {
        name: {
            required: true
        }, type: {
            required: true
        }, status: {
            required: true
        }, category: {
            required: true
        }, purchasing_price: {
            required: true
        }, main_unit: {
            required: true
        }, main_unit_wholesale_price: {
            required: true
        }, main_unit_half_wholesale_price: {
            required: true
        }, main_unit_consumer_price: {
            required: true
        }, "secondary_unit[]": {
            required: () => $('select[name^="secondary_unit[]"]').length > 0

        }, "percentage[]": {
            required: () => $('select[name^="secondary_unit[]"]').length > 0
        }, "wholesale_price[]": {
            required: () => $('select[name^="secondary_unit[]"]').length > 0
        }, "half_wholesale_price[]": {
            required: () => $('select[name^="secondary_unit[]"]').length > 0
        }, "consumer_price[]": {
            required: () => $('select[name^="secondary_unit[]"]').length > 0
        }
    }
})




