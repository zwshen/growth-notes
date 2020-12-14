# Skill: Embedded Programming

## Readings List
* Embedded Programming
  * 嵌入式系統開發之道
  * The Firmware Handbook https://www.amazon.com/Firmware-Handbook-Embedded-Technology/dp/075067606X
  * Embedded Software know it all
  * Embedded Hardware know it all
* Code Complete 2
  * Applying UML and Patterns 3rd Edition
  * Steve McConnell - Rapid Development - Taming Wild Software Schedules
  * Software Requirements 3
* Computer Systems: A Programmer's Perspective, 3/E (CS:APP3e) http://csapp.cs.cmu.edu/
  * CMU 兩位教授 Randal E. Bryant 和 David R. O’Hallaron 巧妙地把程式設計及效能最佳化、數位電路基礎、指令集架構、組合語言、儲存裝置、連結器與載入器、行程、虛擬記憶體等等自各不同的學科的核心知識點攪和在一起，並以程式開發者的視角呈現，所以這本書的書名叫 “A Programmer’s Perspective”。
* Structure And Interpretation Of Computer Programs
* Operating Systems - Three Easy Pieces (OSTEP)
* 電子電路
  * 微電子學 Vol 1
  * The art of electronics (3rd) https://www.amazon.com/Art-Electronics-Paul-Horowitz/dp/0521809266
  * Fundamentals of Electric Circuits


## meta learning

## Code Complete - teaches us the importance of software construction, and how to do it right.

### Laying the Foundation

* What Is Software Construction
  * What Is Software Construction?
  * Why Is Software Construction Important?
  * How to Read This Book

* Metaphors for a Richer Understanding of Software Development
  * The Importance of Metaphors
  * How to Use Software Metaphors
  * Common Software Metaphors
  * Combining Metaphors

* Measure Twice, Cut Once: Upstream Prerequisites
  * Importance of Prerequisites
  * Determine the Kind of Software You're Working On
  * Problem-Definition Prerequisite
  * Requirements Prerequisite
  * Architecture Prerequisite
  * Amount of Time to Spend on Upstream Prerequisites

* Key Construction Decisions
  * Choice of Programming Language
  * Programming Conventions
  * Your Location on the Technology Wave
  * Selection of Major Construction Practices

* Design in Construction
  * Design Challenges
  * Key Design Concepts
  * Design Building Blocks: Heuristics
  * Design Practices
  * Comments on Popular Methodologies

* Working Classes
  * Class Foundations: Abstract Data Types (ADTs)
  * Good Class Interfaces - Good Abstraction, Good Encapsulation
  * Design and Implementation Issues
  * Reasons to Create a Class
  * Language-Specific Issues
  * Beyond Classes: Packages

* High-Quality Routines
  * Valid Reasons to Create a Routine
  * Design at the Routine Level
  * Good Routine Names
  * How Long Can a Routine Be?
  * How to Use Routine Parameters
  * Special Considerations in the Use of Functions
  * Macro Routines and Inline Routines

* Defensive Programming
  * Protecting Your Program from Invalid Inputs
  * Assertions
  * Error-Handling Techniques
  * Exceptions
  * Barricade Your Program to Contain the Damage Caused by Errors
  * Debugging Aids
  * Determining How Much Defensive Programming to Leave in Production Code
  * Being Defensive About Defensive Programming

* The Pseudocode Programming Process
  * Summary of Steps in Building Classes and Routines
  * Pseudocode for Pros
  * Constructing Routines by Using the PPP
  * Alternatives to the PPP

* Variables
* General Issues in Using Variables
  * Data Literacy
  * Making Variable Declarations Easy
  * Guidelines for Initializing Variables
  * Scope
  * Persistence
  * Binding Time
  * Relationship Between Data Types and Control Structures
  * Using Each Variable for Exactly One Purpose

* The Power of Variable Names
  * Considerations in Choosing Good Names
  * Naming Specific Types of Data
  * The Power of Naming Conventions
  * Informal Naming Conventions
  * Standardized Prefixes
  * Creating Short Names That Are Readable
  * Kinds of Names to Avoid

* Fundamental Data Types
  * Numbers in General
  * Integers
  * Floating-Point Numbers
  * Characters and Strings
  * Boolean Variables
  * Enumerated Types
  * Named Constants
  * rrays
  * Creating Your Own Types (Type Aliasing)

* Unusual Data Types
  * Structures
  * Pointers
  * Global Data

* Organizing Straight-Line Code
  * Statements That Must Be in a Specific Order
  * Statements Whose Order Doesn't Matter

* Using Conditionals
  * if Statements
  * case Statements

* Controlling Loops
  * Selecting the Kind of Loop
  * Controlling the Loop
  * Creating Loops Easily—From the Inside Out
  * Correspondence Between Loops and Arrays

* Unusual Control Structures
  * Multiple Returns from a Routine
  * Recursion
  * goto
  * Perspective on Unusual Control Structures

* Table-Driven Methods
  * General Considerations in Using Table-Driven Methods
  * Direct Access Tables
  * Indexed Access Tables
  * Stair-Step Access Tables
  * Other Examples of Table Lookups

* General Control Issues
  * Boolean Expressions
  * Compound Statements (Blocks)
  * Null Statements
  * Taming Dangerously Deep Nesting
  * A Programming Foundation: Structured Programming
  * Control Structures and Complexity

* The Software-Quality Landscape
  * Characteristics of Software Quality
  * Techniques for Improving Software Quality
  * Relative Effectiveness of Quality Techniques
  * When to Do Quality Assurance
  * The General Principle of Software Quality

* Collaborative Construction
  * Overview of Collaborative Development Practices
  * Pair Programming
  * Formal Inspections
  * Other Kinds of Collaborative Development Practices

* Developer Testing
  * Role of Developer Testing in Software Quality
  * Recommended Approach to Developer Testing
  * Bag of Testing Tricks
  * Typical Errors
  * Test-Support Tools
  * Improving Your Testing
  * Keeping Test Records

* Debugging
  * Overview of Debugging Issues
  * Finding a Defect
  * Fixing a Defect
  * Psychological Considerations in Debugging
  * Debugging Tools—Obvious and Not-So-Obvious

* Refactoring
  * Kinds of Software Evolution
  * Introduction to Refactoring
  * Specific Refactorings
  * Refactoring Safely
  * Refactoring Strategies

* Code-Tuning Strategies
  * Performance Overview
  * Introduction to Code Tuning
  * Kinds of Fat and Molasses
  * Measurement
  * Iteration
  * Summary of the Approach to Code Tuning

* Code-Tuning Techniques
  * Logic
  * Loops
  * Data Transformations
  * Expressions
  * Routines
  * Recoding in a Low-Level Language
  * The More Things Change, the More They Stay the Same

* How Program Size Affects Construction
  * Communication and Size
  * Range of Project Sizes
  * Effect of Project Size on Errors
  * Effect of Project Size on Productivity
  * Effect of Project Size on Development Activities

* Managing Construction
  * Encouraging Good Coding
  * Configuration Management
  * Estimating a Construction Schedule
  * Measurement
  * Treating Programmers as People
  * Managing Your Manager

* Integration
  * Importance of the Integration Approach
  * Integration Frequency—Phased or Incremental?
  * Incremental Integration Strategies
  * Daily Build and Smoke Test

* Programming Tools
  * Design Tools
  * Source-Code Tools
  * Executable-Code Tools
  * Tool-Oriented Environments
  * Building Your Own Programming Tools
  * Tool Fantasyland

* Layout and Style
  * Layout Fundamentals
  * Layout Techniques
  * Layout Styles
  * Laying Out Control Structures
  * Laying Out Individual Statements
  * Laying Out Comments
  * Laying Out Routines
  * Laying Out Classes

* Self-Documenting Code
  * External Documentation
  * Programming Style as Documentation
  * To Comment or Not to Comment
  * Keys to Effective Comments
  * Commenting Techniques
  * IEEE Standards

* Personal Character
  * Isn't Personal Character Off the Topic?
  * Intelligence and Humility
  * Curiosity
  * Intellectual Honesty
  * Communication and Cooperation
  * Creativity and Discipline
  * Laziness
  * Characteristics That Don't Matter As Much As You Might Think
  * Habits

* Themes in Software Craftsmanship
  * Conquer Complexity
  * Pick Your Process
  * Write Programs for People First, Computers Second
  * Program into Your Language, Not in It
  * Focus Your Attention with the Help of Conventions
  * Program in Terms of the Problem Domain
  * Watch for Falling Rocks
  * Iterate, Repeatedly, Again and Again
  * Thou Shalt Rend Software and Religion Asunder
