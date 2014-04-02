var MessageModel = Backbone.Model.extend({
    urlRoot : 'http://ec2-54-186-195-12.us-west-2.compute.amazonaws.com/TwitterFeed/auth.php',
    defaults: {
        message: "Text Message"
    }
});

var MessageView = Backbone.View.extend({

    template:_.template($('#tpl-hello-backbone').html()),

    render:function (eventName) {
        $(this.el).html(this.template(this.model.toJSON()));
        return this;
    }
});

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
