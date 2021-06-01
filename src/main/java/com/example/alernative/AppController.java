package com.example.alernative;


import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.RequestMapping;

import java.util.List;

@Controller
public class AppController {
    @Autowired
    private UserSevirce service;


    @GetMapping("")
    public String viewHomePage() {
        return "index";
    }

    @GetMapping("/home")
    public String viewHome() {
        return "home";
    }





    @GetMapping("/register")
    public String showSignUpForm(Model model) {
        model.addAttribute("user", new User());
        return "signup_form";
    }




    @PostMapping("/process_register")
    public String processRegistration(User user) {
        service.saveUserWithDefaultRole(user);
        return "register_success";
    }

    @GetMapping("list_users")
    public String viewUsersList(Model model) {
        List<User> listUsers = service.listAll();
        model.addAttribute("listUsers", listUsers);

        return "users";
    }

    @GetMapping("/users/edit/{id}")
    public String editUser(@PathVariable("id") Long id, Model model) {
        User user = service.get(id);
        List<Role> listRoles = service.getRoles();

        model.addAttribute("user", user);
        model.addAttribute("listRoles", listRoles);
        return "user_form";
    }

    @PostMapping("/users/save")
    public String saveUser(User user) {
        service.save(user);
        return "redirect:/list_users";
    }


    @RequestMapping("users/delete/{id}")
public String delete(@PathVariable(name = "id") long id, Model model) {
        User user = service.get(id);
        List<Role> listRoles = service.getRoles();
    service.delete(user);
    return "redirect:/list_users";
}
}


