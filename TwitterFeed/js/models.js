var MessageModel = Backbone.Model.extend({
    urlRoot : 'http://localhost/auth.php',
    defaults: {
        statuses: "Text Message"
    }
});
