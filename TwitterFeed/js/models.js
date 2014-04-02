var MessageModel = Backbone.Model.extend({
    urlRoot : 'http://localhost/TwitterFeed/auth.php',
    defaults: {
        statuses: "Text Message"
    }
});
