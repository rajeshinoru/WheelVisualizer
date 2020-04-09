from detecto import core, utils, visualize
print('Started.......................')
dataset = core.Dataset('images/')
print('Dataset Finished.......................')
model = core.Model(['wheel'])
print('Model Finished.......................')
model.fit(dataset)
print('Completed.......................')