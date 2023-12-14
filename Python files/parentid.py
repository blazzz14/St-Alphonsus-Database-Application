parents = [
"Adam Allan",
"Abigail Allan",

"Adrian Alsop",
"Alexandra Alsop",

"Alan Young",
"Zoe Young",

"Alexander White",

"Andrew Welch",
"Yvonne Welch",

"Anthony Wallace",
"Wendy Wallace",

"Austin Vaughan",
"Virginia Vaughan",

"Benjamin Underwood",
"Victoria Underwood",

"Blake Turner",
"Vanessa Turner",

"Boris Reis",
"Una Reis",

"Brandon Sharp",
"Tracey Sharp",

"Brian Rutherford",
"Theresa Rutherford",

"Cameron Ross",
"Sue Ross",

"Carl Randall",
"Stephanie Randall",

"Charles Peters",
"Sonia Peters",

"Christian Parr",
"Sally Parr",

"Christopher Paige",
"Penelope Paige",

"Colin Ogden",
"Nicola Ogden",

"Connor Newman",
"Michelle Newman",

"Dan Mitchell",
"Lisa Mitchell",

"David Miller",
"Lillian Miller",

"Dominic Mackay",
"Kylie Mackay",

"Dylan MacLeod",
"Julia MacLeod"
]

#Use previous function logic used in studentIds to generate Parent IDs
def gen_parentID(first_name, last_name, index):
    #Limit numeric component to 3chars so ID is consistent with MySQL max <=10chars
    return f"{first_name[:3].upper()}{last_name[:1].upper()}{index:03d}"
    #() not necessary in this f-string as grouping not required

#Output data with parentIDs and TAB separation to a text file
output_file = "parentid_data.txt"
#Use "w" method since we are writing to student_data.txt
with open(output_file, "w") as output_file:
    #create a loop for the list to generate IDs using student info
    for index, parent in enumerate(parents, start=1):
        #split the concatenated name string in students list
        first_name, last_name = parent.split()
        #call gen_studentID function within loop
        parent_id = gen_parentID(first_name, last_name, index)
        #output with tabs so MySQL can read the file with tabs
        #Use f string to format the output as intented
        output_file.write(f"{parent_id}\t{first_name}\t{last_name}\n")

print(f"Parent data has been written to {output_file}")
