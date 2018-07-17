




        <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
            <label class="bmd-label-floating">{{ __('Title')}}</label>
            <input id="title" type="text"
                   class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}"
                   name="title" value="{{ old('title',$article->title) }}" minLength="3" >
            @if ($errors->has('title'))
            <span class="invalid-feedback">
                 <strong>{{ $errors->first('title') }}</strong>
            </span>
            @endif
        </div>
        <div class="form-group{{ $errors->has('summary') ? ' has-error' : '' }}">
            <label class="bmd-label-floating">{{ __('Summary')}}</label>
            <input id="summary" type="text"
                   class="form-control{{ $errors->has('summary') ? ' is-invalid' : '' }}"
                   name="summary" value="{{ old('summary',$article->summary) }}" >
            @if ($errors->has('summary'))
            <span class="invalid-feedback">
                                                     <strong>{{ $errors->first('summary') }}</strong>
                                                </span>
            @endif
        </div>
        <div class="row">
            <div class="col-sm-6 row-block">
                <select class="selectpicker " data-style="select-with-transition" title="Choose Color" id="" name="colors[]" data-size="7">
                    <option disabled>Choose color</option>
                    @foreach($colors as $color)
                    <option value="{{ $color->id }}"
                            @foreach ($article->colors as $articleColor)
                        @if ($articleColor->id == $color->id)
                        selected
                        @endif
                        @endforeach
                        >{{ $color->slug }}
                    </option>
                    @endforeach
                </select>
            </div>
            <div class="col-sm-6 row-block">
                <select class="selectpicker " data-style="select-with-transition" title="Choose Category"  data-size="7" name="categories[]"  required autofocus aria-hidden="true">
                    <option disabled>Choose Category</option>
                    @foreach($categories as $category)
                    <option value="{{ $category->id }}"
                            @foreach ($article->categories as $articleCategory)
                        @if ($articleCategory->id == $category->id)
                        selected
                        @endif
                        @endforeach
                        >{{ $category->name }}
                    </option>
                    @endforeach
                    @if ($errors->has('category_id'))
                    <span class="invalid-feedback">
                     <strong>{{ $errors->first('category_id') }}</strong>
                    </span>
                    @endif
                </select>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 ml-auto mr-auto">
                <div class="profile text-center">
                    <br>
                    <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                        <div class="fileinput-new thumbnail img-raised">
                            <img src=" " alt="...">
                        </div>
                        <div class="fileinput-preview fileinput-exists thumbnail img-raised"></div>
                        <div>
                            <span class="btn btn-raised btn-round btn-info btn-file">
                                <span class="fileinput-new">Select image</span>
                                <span class="fileinput-exists">Change</span>
                                <input id="cover_image" type="file" class="form-control" name="cover_image">
                            </span>
                            <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="submit text-center">
            <div class="form-check">
                <label class="form-check-label text-rose">
                    <input class="form-check-input" type="checkbox" name="status" value="1"  @if($article->status == 1)
                    {{'checked'}}
                    @endif> Post Your Article !
                    <span class="form-check-sign">
                        <span class="check"></span>
                    </span>
                </label>
            </div>
        </div>
        <div class="form-group label-floating">
            <label class="form-control-label bmd-label-floating" for="example5"></label>
            <textarea class="form-control" id="article-ckeditor" name="body" type="text" cols="80"   >{{ old('body',$article->body) }}</textarea>
            <b >Use Markdown with <a href="https://help.github.com/categories/writing-on-github/" class="card-title text-danger">GitHub-flavored</a> code blocks.</b>
            <div class="col-md-12">
                <h6>Tags</h6>


                <input type="text" value="{{ old('tags', $article->tagsList) }}" name="tags" class="tagsinput form-control{{ $errors->has('tags') ? ' is-invalid' : '' }}" data-role="tagsinput" data-color="rose" placeholder="Tags" required>
                <!-- You can change data-color="rose" with one of our colors primary | warning | info | danger | success -->
                @if ($errors->has('tags'))
                <span class="invalid-feedback">
                 <strong>{{ $errors->first('tags') }}</strong>
                </span>
                @endif
            </div>
        </div>

        <div class="submit text-center">
            <input type="submit" class="btn btn-warning btn-raised btn-round " value="Post article">
        </div>

        <div class="submit text-center">
            <a href="{{ route('/', Auth::user()->username) }}" class="btn btn-info btn-round btn-raised">
                <i class="material-icons">arrow_back_ios</i> Back profile page
            </a>
        </div>




