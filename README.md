# WeirdChain

Encapsulate a Class into a chain, then run what you want.

```
$you = new WeirdChain(new Stuff());
$result = $you
	->can()
	->do($something)
	->like()
	->this();

echo $result(); //Invoke to get result
```

-- testing purpose
