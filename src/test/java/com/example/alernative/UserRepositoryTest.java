package com.example.alernative;

import com.example.alernative.repo.RoleRepository;
import com.example.alernative.repo.UserRepository;
import org.junit.jupiter.api.Test;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.boot.test.autoconfigure.jdbc.AutoConfigureTestDatabase;
import org.springframework.boot.test.autoconfigure.jdbc.AutoConfigureTestDatabase.Replace;
import org.springframework.boot.test.autoconfigure.orm.jpa.DataJpaTest;
import org.springframework.boot.test.autoconfigure.orm.jpa.TestEntityManager;
import org.springframework.test.annotation.Rollback;
import static org.assertj.core.api.Assertions.assertThat;
@DataJpaTest
@AutoConfigureTestDatabase(replace = Replace.NONE)
@Rollback(false)
public class UserRepositoryTest {

    @Autowired
    private UserRepository userRepo;

    @Autowired
    private RoleRepository roleRepo;

    @Autowired
    private TestEntityManager entityManager;

    @Test
    public void testCreateUser() {
        User user = new User();
        user.setEmail("talent@gmail.com");
        user.setPassword("talent123");
        user.setFirstName("talent");
        user.setLastName("bootcamp");

        User savedUser = userRepo.save(user);

        User existUser = entityManager.find(User.class, savedUser.getId());

        assertThat(existUser.getEmail()).isEqualTo(user.getEmail());
    }
    @Test
    public void testFindUserByEmail() {
        String email = "victor@gmail.com";

        User user = userRepo.findByEmail(email);
        assertThat(user).isNotNull();


    }
    @Test
    public void testAddRoleToNewUser(){
        User user = new User();
        user.setEmail("jacob@gmail.com");
        user.setPassword("jacob123");
        user.setFirstName("jacob");
        user.setLastName("talent");

        Role roleUser = roleRepo.findByName("User");
        user.addRole(roleUser);

        User savedUSer = userRepo.save(user);

        assertThat(savedUSer.getRoles().size()).isEqualTo(1);


    }
    @Test
    public void testAddRolesToExistingUser(){
        User user = userRepo.findById(1L).get();

        Role roleUser = roleRepo.findByName("User");
        user.addRole(roleUser);

        Role roleAdmin = new Role(2L);
        user.addRole(roleAdmin);

        User savedUSer = userRepo.save(user);

        assertThat(savedUSer.getRoles().size()).isEqualTo(2);


    }

}
