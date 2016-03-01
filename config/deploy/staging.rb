# Simple Role Syntax
# ==================
# Supports bulk-adding hosts to roles, the primary
# server in each group is considered to be the first
# unless any hosts have the primary property set.
# Don't declare `role :all`, it's a meta role
role :app, %w{deploy@creativespaces.us}
role :web, %w{deploy@creativespaces.us}
role :db,  %w{deploy@creativespaces.us}


# server 'creativespaces.us', user: 'deploy', roles: %w{web app}, my_property: :my_value
