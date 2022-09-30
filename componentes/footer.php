  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
  <script>
    //pegue o valor do input com o id imgemL 
    //e coloque no src da imagem com o id imagemP
    //ovindo o evento change do input

    document.getElementById('imagemL').addEventListener('change', function() {
      document.getElementById('imagemP').src = this.value;
    });
  </script>
  </body>

  </html>