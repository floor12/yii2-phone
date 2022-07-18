const f12phone = {
    validatePhone(value, messages, options) {
        value = value.replace(/_|-| |\(|\)|\+/g, '');
        if (this.isEmpty(value)) {
            return;
        }
        if (!this.isNumeric(value)) {
            this.addMessage(messages, f12_phone_error_format, value);
            return;
        }
        value = value.replace(/\D/g, '');
        if (value.length > 15 || value.length < 11)
            this.addMessage(messages, f12_phone_error_length, value);
    },
    addMessage(messages, message, value) {
        messages.push(message.replace(/\{value\}/g, value));
    },
    isEmpty(value, trim) {
        return value === null || value === undefined || value == []
            || value === '' || trim && $.trim(value) === '';
    },

    isNumeric(str) {
        /**
         * https://stackoverflow.com/questions/175739/how-can-i-check-if-a-string-is-a-valid-number
         */
        if (typeof str != "string") return false // we only process strings!
        return !isNaN(str) && // use type coercion to parse the _entirety_ of the string (`parseFloat` alone does not do this)...
            !isNaN(parseFloat(str)) // ...and ensure strings of whitespace fail
    }
}


