

var MessageRouter = Backbone.Router.extend({
    routes:{
        "": "displayMessage"
    },
    displayMessage: function() {
        var messageModel = new MessageModel();

        var messageView = new MessageView({model:messageModel});
        messageModel.fetch({
            success: function () {
                $('#msg').html(messageView.render().el);
            }
        });
    }
});

var messageRouter = new MessageRouter();
Backbone.history.start();
