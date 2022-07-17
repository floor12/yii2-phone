function addMessage(messages, message, value) {
    messages.push(message.replace(/\{value\}/g, value));
}

function isEmpty(value, trim) {
    return value === null || value === undefined || value == []
        || value === '' || trim && $.trim(value) === '';
}

function validatePhone(value, messages, options) {
    value = value.replace(/\D/g, '');

    if (isEmpty(value)) {
        return;
    }

    if (value.length > 13 || value.length < 11)
        addMessage(messages, f12_phone_error_length, value);
}

