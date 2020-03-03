# gravatar-default
An extended nova Gravatar field 

 - Import the correct field
 
 `use Braceyourself\GravatarDefault\Gravatar;`

# Set a default url image
```
    public function fields(Request $request)
    {
        return [
            Gravatar::make()
                ->default('https://cdn3.iconfinder.com/data/icons/cool-avatars-2/190/00-07-2-512.png');
        ];
    }


```
