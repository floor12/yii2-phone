function addMessage(messages, message, value) {
    messages.push(message.replace(/\{value\}/g, value));
};

function isEmpty(value, trim) {
    return value === null || value === undefined || value == []
        || value === '' || trim && $.trim(value) === '';
};

function validatePhone(value, messages, options) {
    value = value.replace(/\D/g, '');

    if (isEmpty(value)) {
        return;
    }

    if (value.length > 12 || value.length < 11)
        addMessage(messages, "Телефонный номер должны быть длиною 11 или 12 цифр.", value);


}

