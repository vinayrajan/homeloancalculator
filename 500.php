<%- include('header') -%>

<main>      
  <div class="px-4 py-5 my-5 text-center">      
    <h1 class="display-5 fw-bold">500</h1>
    <div class="col-lg-6 mx-auto">      
      <div class="alert alert-danger" role="alert">
        <h4 class="alert-heading">Error - <%= error.message %></h4> <hr>
          <% if (settings['verbose errors']) { %>
            <code><%= error.stack %></code>
          <% } else { %>
            <p>An error occurred!</p>
          <% } %>
        
      </div>

      <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
        <a href="<%= base_url %>" class="btn btn-primary btn-lg px-4 gap-3">Homepage</a>
          <a href="<%= back_url %>" class="btn btn-outline-secondary btn-lg px-4">Back</a>
      </div>
    </div>
  </div>


  <div class="b-example-divider"></div>
</main>


<%- include('footer') -%>