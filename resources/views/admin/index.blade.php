<!-- testing admin {{auth()->guard('admin')->user()->name}} -->
<!DOCTYPE html>
<html lang="en">
{{ Auth::guard('admin')->user()->name }}
</html>