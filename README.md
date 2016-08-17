# date_gen

PHP script that generate dates in user specified format from user specified range.

## Usage

**php date_gen.php [options]**

**[OPTIONS]**

&nbsp;&nbsp;&nbsp;&nbsp; **-b** &nbsp;&nbsp;&nbsp;&nbsp; begin of date interval (default 1970.01.01)

&nbsp;&nbsp;&nbsp;&nbsp; **-e** &nbsp;&nbsp;&nbsp;&nbsp; end of date interval (default: [current_year].12.31)

&nbsp;&nbsp;&nbsp;&nbsp; **-f** &nbsp;&nbsp;&nbsp;&nbsp; input/output date format (default: 'Y.m.d')

## Examples

#### Run without parameters:

**php date_gen.php**

```
	1970.01.01
	1970.01.02
	...
	2016.12.30
	2016.12.31
```

#### Get all dates from 2014 to current year:

**php date_gen.php -b 2014.01.01**

```
	2014.01.01
	2014.01.02
	...
	2016.12.30
	2016.12.31
```

#### Get all dates between 18.03.2016 and 18.04.2016:

**php date_gen.php -b 2016.03.18 -e 2016.04.18**

```
	2016.03.01
	2016.03.02
	...
	2016.04.17
	2016.04.18
```

#### Using custom format:

**php date_gen.php -b 18.03.2016 -e 18.04.2016 -f d.m.Y**

```
	01.03.2016
	02.03.2016
	...
	17.04.2016
	18.04.2016
```

#### Get all possible day/month combinations:

**php date_gen.php -f d.m**

```
	01.01
	02.01
	...
	30.12
	31.12
```