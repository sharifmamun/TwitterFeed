// Define the View
TweetsView = Backbone.View.extend({
    initialize: function() {
      _.bindAll(this, 'render');
      // create a collection
      this.collection = new Tweets;
      // Fetch the collection and call render() method
      var that = this;
      this.collection.fetch({
        success: function () {
            that.render();
        }
      });
    },
    // Use an extern template
    template: _.template($('#tweetsTemplate').html()),

    render: function() {
        // Fill the html with the template and the collection
        $(this.el).html(this.template({ tweets: this.collection.toJSON() }));
    }
});

var app = new TweetsView({
    // define the el where the view will render
    el: $('body')
});
