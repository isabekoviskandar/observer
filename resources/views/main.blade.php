<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Agent Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <div class="container mt-5">
      <h2 class="mb-4">Agent Management</h2>
      
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>#</th>
            <th>Name</th>
            <th>Phone</th>
            <th>Parent</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($agents as $key => $agent)
            <tr>
              <td>{{ $key + 1 }}</td>
              <td>{{ $agent->name }}</td>
              <td>{{ $agent->tel }}</td>
              <td>{{ $agent->parent_id ? $agent->parent->name : 'No Parent' }}</td>
              <td>
                <form action="{{ route('agents.destroy', $agent->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this agent?');">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                </form>
              </td>
              
              
            </tr>
          @endforeach

          <!-- Form Row -->
          <tr>
            <form action="{{ route('agents.store') }}" method="POST">
              @csrf
              <td>#</td>
              <td><input type="text" name="name" class="form-control" placeholder="Enter name" required></td>
              <td><input type="text" name="tel" class="form-control" placeholder="Enter phone" required></td>
              <td>
                <select name="parent_id" class="form-control">
                  <option value="">No Parent</option>
                  @foreach ($agents as $parentAgent)
                      <option value="{{ $parentAgent->id }}">{{ $parentAgent->name }}</option>
                  @endforeach
                </select>
              </td>
              <td><button type="submit" class="btn btn-success btn-sm">Add</button></td>
            </form>
          </tr>
        </tbody>
      </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
