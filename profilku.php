       
        <?php 
        // tangkap request id url
        $id = $_GET['id'];
        $model = new Member();
        $member = $model->infoMember([$id]);
        if(empty($member['foto']) ){
            $member['foto'] ='nophoto.png';
        }
        ?>
        <h3>Detail Pegawai</h3>
        <div class="card" style="width: 18rem;">
        <img src="images/<?= $member['foto']?>" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title"> <?= $member['fullname']?> </h5>
          <p class="card-text">
          <table>
          <tr>
          <th>Username</th>
          <td>:</td>
          <td><?=$member['username'] ?></td>
          </tr>
          <tr>
          <th>Email</th>
          <td>:</td>
          <td><?=$member['email'] ?></td>
          </tr>
          <tr>
          <th>Role</th>
          <td>:</td>
          <td><?=$member['role'] ?></td>
          </tr>
          </table>
          </p>
          <a href="index.php" class="btn btn-primary">Kembali</a>
        </div>
        </div>






