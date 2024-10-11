$(document).ready(function() {
    $('.simple-payment #closed').change(function() {
        if (this.checked) {
            $('#closed_date').removeAttr('readonly');
            let utcDate = new Date();
            $('#closed_date').prop('valueAsNumber', Math.floor(new Date(utcDate.getTime() - 3 * 60 * 60 * 1000) / 60000) * 60000);
            $('#payment_method_id').removeAttr('disabled');
        } else {
            $('#closed_date').attr('readonly', true);
            $('#closed_date').val(null);
            $('#payment_method_id').attr('disabled', true);
            $('#payment_method_id').val(null);
        }
    });
});
$(document).ready(function() {

    // Conversão de valor monetário em decimal, ex.: 1.500,00 => 1500.00
    decimal = function(val) {
        return parseFloat(val.replace('R$ ', '').replace(/\./g, '').replace(',', '.'));
    }

    // Conversão de valor decimal em monetário, ex.: 1500.00 => 1.500,00
    monetary = function(val) {
        return val.toFixed(2).replace('.', ',').replace(/\B(?=(\d{3})+(?!\d))/g, ".").toString();
    }
    
    // Troca de condição de pagamento
    $('#billing-component #payment_condition').change(function() {
        if(this.value != 2) {
            $('#billing-component #parcels').hide();
        } else {
            $('#billing-component #parcels').show();
        }
    });

    // Acréscimo de valores a receber
    $('#billing-component #addition_value').blur(function() {
        calc_balance_value();
    });

    // Desconto de valores a receber
    $('#billing-component #discount_value').blur(function() {
        calc_balance_value();
    });

    // Mudança no tipo de acréscimo
    $('#billing-component #addition_method').on('change', function() {
        calc_balance_value();
    });

    // Mudança no tipo de desconto
    $('#billing-component #discount_method').on('change', function() {
        calc_balance_value();
    });

    // Parcelamento de valores a receber
    $('#billing-component #parceled_value').blur(function() {
        calc_balance_value();
    }).focus(function() {
        if (isNaN(decimal($(this).val()))) {
            let balance = $('#billing-component #balance_value').val();
            $('#billing-component #parceled_value').val(balance);
        }
    });

    // Calcula o total de acréscimos
    calc_addition_value = function() {
        let total_value = decimal($('#billing-component #original_total_value').val());
        let addition_value = decimal($('#billing-component #addition_value').val());
        let addition_method = $('#billing-component #addition_method').val();
        let addition = addition_value;
        if (addition_method == 'P') {
            addition = (total_value * (addition_value / 100));
        }
        return !isNaN(addition) ? addition : 0;
    }

    // Calcula o total de descontos
    calc_discount_value = function() {
        let total_value = decimal($('#billing-component #original_total_value').val());
        let discount_value = decimal($('#billing-component #discount_value').val());
        let discount_method = $('#billing-component #discount_method').val();
        let discount = discount_value;
        if (discount_method == 'P') {
            discount = (total_value * (discount_value / 100));
        }
        return !isNaN(discount) ? discount : 0;
    }

    // Calcula total parcelado
    calc_parceled_value = function() {
        let parceled_value = decimal($('#billing-component #parceled_value').val());
        return !isNaN(parceled_value) ? parceled_value : 0;
    }

    // Calcula o total de pagamentos
    var payments = [];
    calc_payment_value = function() {
        let payment_value = 0;
        for (let payment of payments) {
            if (payment != undefined) {
                payment_value += decimal(payment.payment_value);
            }
        }
        return payment_value;
    }

    // Hook disparado ao adicionar formas de pagamento
    payments_add_after = function(itens, item, index) {
        payments = itens;
        blur_payment_event(index);
        calc_balance_value();
        return true;
    };

    // Hook disparado ao remover formas de pagamento
    payments_remove_after = function(itens, item, index) {
        payments = itens;
        blur_payment_event(index);
        calc_balance_value();
        return true;
    };

    // Mudança no valor de algum pagamento
    blur_payment_event = function(index) {
        $('#billing-component #payment_value_' + index).blur(function() {
            if (payments[index] != undefined) {
                payments[index].payment_value = $(this).val();
                calc_balance_value();
            }
        });    
    }

    // Calcula o saldo restante
    calc_balance_value = function() {
        let total_value = decimal($('#billing-component #original_total_value').val());
        let addition_value = calc_addition_value();
        let discount_value = calc_discount_value();
        let parceled_value = calc_parceled_value();
        let payment_value = calc_payment_value();
        let received_value = payment_value + parceled_value;
        let total = total_value + addition_value - discount_value;
        let balance = total - payment_value - parceled_value;
        let change = 0;
        if (balance < 0) {
            change = balance * -1;
            balance = 0;
        }
        $('#billing-component #billing_total_value').html(monetary(total));
        $('#billing-component #total_value').val(monetary(total));
        $('#billing-component #billing_received_value').html(monetary(received_value));
        $('#billing-component #received_value').val(monetary(received_value));
        $('#billing-component #billing_balance_value').html(monetary(balance));
        $('#billing-component #balance_value').val(monetary(balance));
        $('#billing-component #billing_change_value').html(monetary(change));
        $('#billing-component #change_value').val(monetary(change));
    }

});