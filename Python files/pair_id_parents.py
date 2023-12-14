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

#Define a function to generate parent pair IDs
def generate_parent_pair_ids(parents):
    dict_pair_id = {}

    for parent in parents:
        names = parent.split()
        first_name_initials = "".join(name[0].upper() for name in names[:-1])  # Extract initials from first names
        last_name = names[-1].upper()  # Extract and capitalise the last name

        # Check if the parent pair ID is already in the dictionary
        if last_name in dict_pair_id:
            parent_pair_id = dict_pair_id[last_name]
        else:
            parent_pair_id = 1

        # Format the parent pair ID
        formatted_pair_id = f"{first_name_initials}{last_name}{parent_pair_id:02}"

        print(f"{parent}: {formatted_pair_id}")

        # Increment the parent pair ID for the last name
        dict_pair_id[last_name] = parent_pair_id + 1

#Call function to generate IDs
generate_parent_pair_ids(parents)

