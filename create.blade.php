
@section ('content')

  <h1>Create a Recipe</h1>

@endsection

<!DOCTYPE html>
<html>
  <link rel="stylesheet" href="{{ URL::asset('css/recipeblog.css') }}" />
  <link rel="stylesheet" href="{{ URL::asset('http://fonts.googleapis.com/css?family=Tangerine') }}" />

   <body background = "https://www.usnews.com/dims4/USNEWS/bcd7e97/2147483647/thumbnail/970x647/quality/85/?url=%2Fcmsmedia%2Fe6%2F4d%2F24ae69104af8a3325e4ec4323d2b%2F150526-variousfoods-stock.jpg">

   <div class = "col-sm-8 blog-main">

   <h1>Submit Your Recipe Card Here</h1>
   <hr>
   
  <form method="POST action" posts"="">
    {{csrf_field()}}

  <div class="form-group">

    <label for="title">Recipe Title:</label>
    <input type="title" name = "title" class="form-control" id="title" placeholder="Name of recipe">

  </div>


  <div class="form-group">

    <label for="description">Description:</label>
    <textarea id = "description" name = "description" class = "form-control"></textarea>
    

  </div>


  <div class="form-group">

    <label for="ingredients">Ingredients:</label>
    <textarea id = "ingredients" name = "ingredients" class = "form-control" placeholder="List the ingredients"></textarea>
  
  </div>


   <div class="form-group">

    <label for="directions">Directions:</label>
    <textarea id = "directions" name = "directions" class = "form-control" placeholder="List the directions"></textarea>

  </div>


  <div class="form-group">

    <label for="picture">Upload Picture of Recipe:</label>
    <input type="file" id="up">

  </div>


  <button type="submit" class="btn btn-primary">Submit</button>
</form>

</div>
   </body>
</html>