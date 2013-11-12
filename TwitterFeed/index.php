            <!doctype html>
            <html>
                <title>
                    backbone example
                </title>
                <body>
				<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>
				<script src="http://ajax.cdnjs.com/ajax/libs/json2/20110223/json2.js"></script>
				<script src="http://ajax.cdnjs.com/ajax/libs/underscore.js/1.1.6/underscore-min.js"></script>
				<script src="http://ajax.cdnjs.com/ajax/libs/backbone.js/0.3.3/backbone-min.js"></script>

                    <div id="container">
                    <h1>
                        HELLO
                    </h1>
                        <div id="page">

                        </div>
                    </div>
                    <script>
                        var User=Backbone.Collection.extend(
                        url:'http://localhost/auth.php',
                            
						fetch : function() {
							// store reference for this collection
							var collection = this;
							$.when( $.ajax( URL, { dataType: "json" } ) )
								.then( $.proxy( function( response ) {
										ctx.view.collection.reset( response );                              
								},ctx ) );
						});
                        var UserList=Backbone.View.extend(
                        {   

                            el:'#page',
                            render:function()
                            {
                                  var that=this;
                                var users=new User;

                                        users.fetch({

                                            success:function()
                                            {
                                                    alert('success');
                                            }
                                    }
                            );
                                }
                        }
                        );
                         var router=Backbone.Router.extend(
                         {
                             routes:
                                 {
                                 '':'home'
                                 }
                         });

                         var userList=new UserList();
                         var rou=new router();
                         rou.on('route:home',function(){

                               userList.render();

                         });
                         Backbone.history.start();
                    </script>
                </body>
         </html>
